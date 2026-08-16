import { Controller } from '@hotwired/stimulus';
import Chart from 'chart.js/auto';

// Palette catégorielle validée (contraste + daltonisme) : bleu, orange, aqua.
const COLOR_REVENUE = '#2a78d6';
const COLOR_EXPENSES = '#eb6834';
const COLOR_NET_PROFIT = '#1baf7a';

export default class extends Controller {
    static targets = ['canvas'];

    static values = {
        labels: Array,
        revenue: Array,
        expenses: Array,
        netProfit: Array,
    };

    connect() {
        new Chart(this.canvasTarget, {
            type: 'bar',
            data: {
                labels: this.labelsValue,
                datasets: [
                    {
                        label: 'Facturation',
                        data: this.revenueValue,
                        backgroundColor: COLOR_REVENUE,
                        borderRadius: 4,
                        order: 2,
                    },
                    {
                        label: 'Charges',
                        data: this.expensesValue,
                        backgroundColor: COLOR_EXPENSES,
                        borderRadius: 4,
                        order: 2,
                    },
                    {
                        type: 'line',
                        label: 'Bénéfice net',
                        data: this.netProfitValue,
                        borderColor: COLOR_NET_PROFIT,
                        backgroundColor: COLOR_NET_PROFIT,
                        borderWidth: 2,
                        pointRadius: 4,
                        tension: .2,
                        order: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: (value) => `${value} €`,
                        },
                    },
                },
            },
        });
    }
}
