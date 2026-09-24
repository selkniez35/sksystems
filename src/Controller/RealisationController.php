<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RealisationController extends AbstractController
{
    #[Route('/realisations', name: 'app_realisations', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('realisation/index.html.twig', [
            // Aucun projet pour l'instant : ils seront ajoutés plus tard depuis une
            // future interface d'administration (aucune n'existe encore pour ce
            // catalogue de réalisations). La grille et les filtres gèrent déjà le
            // cas où ce tableau contient des projets, avec le format attendu par
            // partials/_realisations_grid.html.twig : category, image, description, url.
            'projects' => [],
            'recommendations' => $this->getRecommendations(),
        ]);
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
