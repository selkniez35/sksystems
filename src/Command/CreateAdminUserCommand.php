<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Validation;

#[AsCommand(name: 'app:admin:create-user', description: 'Crée ou met à jour le compte administrateur unique')]
class CreateAdminUserCommand extends Command
{
    public function __construct(
        private readonly UserRepository $users,
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $validator = Validation::createValidator();

        $email = $io->ask('Email du compte administrateur', 'samy.elkniez@sksystems.fr', function (string $answer) use ($validator) {
            $errors = $validator->validate($answer, new Email());
            if (\count($errors) > 0) {
                throw new \RuntimeException('Cet email n\'est pas valide.');
            }

            return $answer;
        });

        $existingUser = $this->users->findOneBy(['email' => $email]);

        if ($existingUser && !$io->askQuestion(new ConfirmationQuestion(
            sprintf('Un compte existe déjà pour "%s". Voulez-vous changer son mot de passe ?', $email),
            false,
        ))) {
            $io->note('Aucune modification effectuée.');

            return Command::SUCCESS;
        }

        $password = $io->askHidden('Mot de passe', function (string $answer) {
            if (\strlen($answer) < 12) {
                throw new \RuntimeException('Le mot de passe doit contenir au moins 12 caractères.');
            }

            return $answer;
        });

        $user = $existingUser ?? new User();
        $user->setEmail($email);
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordHasher->hashPassword($user, $password));

        if (!$existingUser) {
            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();

        $io->success(sprintf('Compte administrateur %s pour "%s".', $existingUser ? 'mis à jour' : 'créé', $email));

        return Command::SUCCESS;
    }
}
