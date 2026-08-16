<?php

namespace App\Controller\Admin;

use App\Repository\MonthlyStatementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
final class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_dashboard', methods: ['GET'])]
    public function index(MonthlyStatementRepository $statements): Response
    {
        $to = new \DateTimeImmutable('today');
        $from = $to->modify('-12 months')->modify('+1 day');

        $statementsInWindow = $statements->findBetween($from, $to);

        $revenue = 0.0;
        $expenses = 0.0;

        $months = [];
        $period = $from->modify('first day of this month');
        while ($period <= $to) {
            $months[$period->format('Y-m')] = [
                'label' => $period->format('m/Y'),
                'revenue' => 0.0,
                'expenses' => 0.0,
                'netProfit' => 0.0,
            ];
            $period = $period->modify('+1 month');
        }

        foreach ($statementsInWindow as $statement) {
            $key = $statement->getMonth()->format('Y-m');
            $statementRevenue = (float) $statement->getRevenue();
            $statementExpenses = (float) $statement->getExpenses();

            $revenue += $statementRevenue;
            $expenses += $statementExpenses;

            if (isset($months[$key])) {
                $months[$key]['revenue'] = $statementRevenue;
                $months[$key]['expenses'] = $statementExpenses;
                $months[$key]['netProfit'] = $statement->getNetProfit();
            }
        }

        return $this->render('admin/dashboard/index.html.twig', [
            'revenueLast12Months' => $revenue,
            'expensesLast12Months' => $expenses,
            'netProfitLast12Months' => $revenue - $expenses,
            'periodFrom' => $from,
            'periodTo' => $to,
            'chartLabels' => array_column($months, 'label'),
            'chartRevenue' => array_column($months, 'revenue'),
            'chartExpenses' => array_column($months, 'expenses'),
            'chartNetProfit' => array_column($months, 'netProfit'),
        ]);
    }
}
