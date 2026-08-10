<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
    public function index(Request $request, TransportInterface $mailerTransport): Response
    {
        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();

            $email = (new Email())
                ->from('samy.elkniez@sksystems.fr')
                ->replyTo($data['email'])
                ->to('samy.elkniez@sksystems.fr')
                ->subject('[Site SK Systems] ' . $data['subject'])
                ->text(sprintf(
                    "Nom : %s\nEmail : %s\n\n%s",
                    $data['name'],
                    $data['email'],
                    $data['message'],
                ));

            $mailerTransport->send($email);

            $this->addFlash('contact_success', 'Merci, votre message a bien été envoyé — je vous répondrai rapidement.');

            return $this->redirect($this->generateUrl('app_home') . '#contact', Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'recommendations' => $this->getRecommendations(),
            'experiences' => $this->getExperiences(),
            'education' => $this->getEducation(),
            'projects' => $this->getProjects(),
            'contactForm' => $contactForm->createView(),
        ]);
    }

    /**
     * @return array<int, array{name: string, client: string, description: string, tags: string[], url: string|null, image: string|null}>
     */
    private function getProjects(): array
    {
        return [
            [
                'name' => 'Nour Dicko Academy',
                'client' => 'Plateforme e-learning',
                'description' => 'Plateforme e-learning complète développée de A à Z : espace élève (cours, replays, documents), espace enseignant, back-office d\'administration et billetterie d\'abonnements sécurisée via Stripe. Architecture Symfony 8, gestion fine des rôles, notifications e-mail automatisées, déploiement conteneurisé avec Docker.',
                'tags' => ['PHP 8.4', 'Symfony 8', 'Doctrine ORM', 'MySQL/MariaDB', 'Stripe API', 'Docker'],
                'url' => 'https://nourdickoacademy.com',
                'image' => 'images/projects/nda-accueil.jpg',
            ],
            [
                'name' => 'MA Boxe Guingamp',
                'client' => 'Club sportif',
                'description' => 'Un club sans site web gérait ses adhésions au papier. Développement d\'une plateforme complète : présentation du club, planning des cours, inscription et paiement de la cotisation en ligne. Le bureau ne ressaisit plus rien.',
                'tags' => ['Symfony', 'PHP', 'MySQL', 'Paiement en ligne'],
                'url' => 'https://maboxe.fr',
                'image' => 'images/projects/maboxe-accueil.jpg',
            ],
            [
                'name' => 'Fédération Française de Fitness',
                'client' => 'Fédération sportive nationale',
                'description' => 'Contribution au site web national de la fédération : conception et réalisation de pages sous WordPress.',
                'tags' => ['WordPress', 'HTML/CSS', 'PHP'],
                'url' => null,
                'image' => null,
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, company: string, contract: string, period: string, location: string, description: string, current: bool}>
     */
    private function getExperiences(): array
    {
        return [
            [
                'title' => 'Fondateur & développeur web Symfony',
                'company' => 'SK Systems',
                'contract' => 'Freelance',
                'period' => 'juin 2026 - aujourd\'hui',
                'location' => 'Rennes, Bretagne, France · Hybride',
                'description' => 'Développeur web freelance spécialisé en Symfony, j\'accompagne les entreprises, indépendants et associations dans la conception et le développement d\'applications web sur mesure. J\'interviens sur des projets de création d\'applications web, de refonte de systèmes existants et d\'amélioration de solutions déjà en place.',
                'current' => true,
            ],
            [
                'title' => 'Développeur Full Stack Symfony',
                'company' => 'Groupe Pandora',
                'contract' => 'CDI',
                'period' => 'oct. 2023 - juin 2026 · 2 ans 9 mois',
                'location' => 'Rennes, Bretagne, France · Hybride',
                'description' => 'Référent du projet Symfony du Groupe Pandora, j\'assurais son évolution et sa maintenance au sein de l\'équipe de développement. J\'intervenais également au sein de la filiale Unixo sur des applications web internes. Stack principale : PHP, Symfony, Doctrine ORM, JavaScript, MySQL, PostgreSQL. J\'ai également participé à la migration de l\'application vers Vue.js et NestJS.',
                'current' => false,
            ],
            [
                'title' => 'Stagiaire développeur',
                'company' => 'Sopra Steria',
                'contract' => 'Stage',
                'period' => 'mars 2023 - sept. 2023 · 7 mois',
                'location' => 'Saint-Grégoire, Bretagne, France',
                'description' => 'Contribution à l\'évolution d\'une application de gestion de rendez-vous dans le monde des télécoms. Développement principalement en Java.',
                'current' => false,
            ],
            [
                'title' => 'Développeur web',
                'company' => 'TAKOS HOUSE',
                'contract' => 'Stage',
                'period' => 'juin 2022 - août 2022 · 3 mois',
                'location' => 'Dijon, Bourgogne-Franche-Comté, France · À distance',
                'description' => 'Conception et réalisation d\'un site web pour un salon de coiffure, en équipe de 5 personnes. Développement WordPress avec injection de code HTML, CSS, PHP, SQL, JavaScript.',
                'current' => false,
            ],
            [
                'title' => 'Gestionnaire de base de données',
                'company' => 'Sonepar France',
                'contract' => 'Contrat en alternance',
                'period' => 'sept. 2020 - sept. 2021 · 1 an 1 mois',
                'location' => 'Boulogne-Billancourt, Île-de-France, France',
                'description' => 'Intégration de données et enrichissement de la base de données PIM. Conception et réalisation d\'un outil d\'automatisation de traitement de données.',
                'current' => false,
            ],
            [
                'title' => 'Consultant stagiaire',
                'company' => 'Crayon',
                'contract' => 'Stage',
                'period' => 'janv. 2020 - févr. 2020 · 2 mois',
                'location' => 'Saint-Cloud, Île-de-France, France',
                'description' => 'Conception et mise en œuvre d\'une solution ETL pour convertir et migrer des données Excel vers SQL Server, afin de gérer l\'inventaire du parc informatique et les licences logicielles de l\'entreprise.',
                'current' => false,
            ],
            [
                'title' => 'Développeur web',
                'company' => 'Com On Cloud',
                'contract' => 'Stage',
                'period' => 'mai 2019 - juil. 2019 · 3 mois',
                'location' => 'Paris, Île-de-France, France',
                'description' => 'Finalisation de la conception et de la réalisation du site web de la Fédération Française de Fitness, avec WordPress et ses extensions.',
                'current' => false,
            ],
        ];
    }

    /**
     * @return array<int, array{degree: string, school: string, period: string, mention: string|null}>
     */
    private function getEducation(): array
    {
        return [
            [
                'degree' => 'Master mention Informatique',
                'school' => 'Université de Rennes',
                'period' => 'sept. 2021 – sept. 2023',
                'mention' => null,
            ],
            [
                'degree' => 'Licence professionnelle Métiers de l\'informatique : Systèmes d\'Information et Gestion de Données',
                'school' => 'Université Évry Paris-Saclay',
                'period' => '2020 – 2021',
                'mention' => 'Mention assez bien',
            ],
            [
                'degree' => 'BTS services informatiques aux organisations',
                'school' => 'Lycée du Parc de Vilgenis',
                'period' => '2018 – 2020',
                'mention' => null,
            ],
            [
                'degree' => 'Baccalauréat scientifique, Sciences de l\'Ingénieur',
                'school' => 'Lycée du Parc des Loges',
                'period' => '2017 – 2018',
                'mention' => null,
            ],
        ];
    }

    /**
     * Recommandations reçues sur LinkedIn et LeHibou, saisies manuellement
     * (ces plateformes ne permettent pas de récupération automatisée).
     *
     * @return array<int, array{name: string, role: string, platform: string, rating: float|null, text: string, date: string}>
     */
    private function getRecommendations(): array
    {
        return [
            [
                'name' => 'Morade Aatach',
                'role' => 'Directeur - Sélection Auto Volkswagen Saint-Brieuc',
                'platform' => 'linkedin',
                'rating' => null,
                'text' => 'Je préconise Samy dans son domaine, qui nous a permis de développer nos entreprises et environnement de nos réseaux.',
                'date' => '2026-08-05',
            ],
            [
                'name' => 'Morade Aatach',
                'role' => 'Président - MA Boxe',
                'platform' => 'lehibou',
                'rating' => 5.0,
                'text' => 'Toujours dispo et une réactivité incroyable. Je vous conseille de travailler avec ce monsieur. Il a toujours une solution ou un contact à nous donner.',
                'date' => '2026-08-03',
            ],
            [
                'name' => 'Vincent Kergoat',
                'role' => 'Développeur Full Stack - UNIXO',
                'platform' => 'linkedin',
                'rating' => null,
                'text' => "Consciencieux et avide d'apprendre, Samy est un excellent atout. Il possède de bonnes compétences en PHP notamment sur le framework Symfony. Il sait travailler dans la détente mais également lorsque le besoin est plus urgent.",
                'date' => '2026-05-21',
            ],
            [
                'name' => 'Mourad Othmani',
                'role' => 'Team leader project management - Crayon',
                'platform' => 'linkedin',
                'rating' => null,
                'text' => "J'ai eu l'occasion d'accompagner Samy en tant que responsable technique lors de son stage, et j'ai particulièrement apprécié son sérieux, son autonomie ainsi que sa capacité d'apprentissage. Curieux et méthodique, il a rapidement su appréhender les enjeux techniques et business. Face aux points de blocage, il s'est toujours montré orienté solution, en proposant des approches pertinentes et pragmatiques. Il a notamment spécifié, conçu et implémenté une solution mise en production, apportant des bénéfices concrets à l'équipe, notamment en termes d'amélioration de la productivité. Cette réalisation illustre à la fois son sens de l'initiative, son efficacité et sa capacité à délivrer de la valeur. Samy est un profil rigoureux, impliqué et prometteur, que je recommande vivement.",
                'date' => '2026-05-06',
            ],
            [
                'name' => 'Valérian Guémené',
                'role' => 'Développeur web - Groupe Pandora',
                'platform' => 'linkedin',
                'rating' => null,
                'text' => "J'ai eu l'occasion de travailler avec Samy au sein du Groupe Pandora sur un projet CRM développé en Symfony, et je le recommande sans hésitation. Samy est un développeur full-stack sérieux, impliqué et fiable. Il maîtrise bien l'écosystème Symfony et sait produire un code propre, structuré et maintenable. Au-delà de ses compétences techniques, il se distingue par sa capacité à comprendre rapidement les besoins métier et à proposer des solutions pertinentes. C'est également quelqu'un d'agréable au quotidien, avec qui la collaboration est fluide. Il sait communiquer efficacement, s'intégrer dans une équipe et faire avancer les projets dans le bon sens. Je recommande Samy à toute équipe à la recherche d'un développeur compétent et investi.",
                'date' => '2026-05-04',
            ],
            [
                'name' => 'Marine Neveu',
                'role' => "Chargée de projets Com' & Créa - Groupe Pandora",
                'platform' => 'linkedin',
                'rating' => null,
                'text' => "Samy est un développeur compétent et réactif. J'ai particulièrement apprécié sa capacité à comprendre rapidement nos besoins de communication et à proposer des solutions adaptées. Un collègue fiable avec qui il est très agréable de collaborer !",
                'date' => '2026-04-30',
            ],
            [
                'name' => 'Karim Laraki',
                'role' => 'IT Finance Project Manager - SEPHORA',
                'platform' => 'linkedin',
                'rating' => null,
                'text' => "J'ai eu l'occasion d'accompagner Samy dans le cadre de son stage. C'est un développeur sérieux, impliqué et agréable au quotidien, qui a rapidement progressé en PHP grâce à sa rigueur et sa bonne compréhension technique. Il sait analyser les besoins, proposer des solutions pertinentes et produire un code propre et maintenable. Curieux et autonome, il a montré une bonne capacité d'apprentissage tout au long de son stage. Je recommande Samy sans hésitation pour tout projet demandant fiabilité et efficacité.",
                'date' => '2026-04-30',
            ],
            [
                'name' => 'Victor Bernard',
                'role' => 'Développeur Fullstack - Groupe Pandora',
                'platform' => 'linkedin',
                'rating' => null,
                'text' => "Samy est un collègue très sympathique et motivé. Il maitrise bien son PHP avec Symfony ainsi que l'architecture MVC. Samy comprend rapidement ce qu'on lui demande, analyse et anticipe facilement les points bloquants. Il n'a pas peur d'explorer de nouvelles technologies (découverte d'un projet en Vue / NestJs en interne). PS: il a une excellente mémoire !",
                'date' => '2026-04-30',
            ],
            [
                'name' => 'Pauline Héry',
                'role' => 'Chargée de projets communication et création - Groupe Pandora',
                'platform' => 'linkedin',
                'rating' => null,
                'text' => "Si vous cherchez un développeur Full Stack fiable, impliqué et vraiment agréable à avoir dans un projet, je ne peux que vous recommander Samy ! Au-delà de ses compétences techniques, c'est quelqu'un de profondément à l'écoute, toujours prêt à trouver des solutions et à aller plus loin pour faire avancer les choses. Il ne compte pas ses heures et s'investit à 100% dans chaque mission. C'est le genre de personne avec qui on aime travailler : pro, humain et efficace. Maintenant lancé en freelance, je suis convaincu qu'il fera un super boulot pour tous ceux qui auront la chance de collaborer avec lui.",
                'date' => '2026-04-30',
            ],
        ];
    }
}
