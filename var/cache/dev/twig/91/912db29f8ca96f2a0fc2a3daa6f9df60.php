<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* home/index.html.twig */
class __TwigTemplate_30f1a71fac03d20171334409b1531c16 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "SK Systems - Développement web & solutions digitales";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "
    <section class=\"hero-section\">
        <div class=\"container\">
            <div class=\"row align-items-center min-vh-75\">

                <div class=\"col-lg-7\">

                    <span class=\"hero-badge mb-3\">
                        <span class=\"dot\"></span>
                        Disponible pour de nouvelles missions
                    </span>

                    <h1 class=\"display-3 fw-bold text-white mt-3\">
                        Créons des solutions web
                        <span class=\"text-primary\">performantes</span>
                    </h1>

                    <p class=\"lead text-light opacity-75 mt-4\">
                        SK Systems accompagne les entreprises et entrepreneurs
                        dans la création de sites web, applications métiers
                        et MVP sur mesure avec Symfony, PHP et JavaScript.
                    </p>

                    <div class=\"mt-4\">
                        <a href=\"#services\" class=\"btn btn-primary btn-lg me-3\">
                            Découvrir mes services
                        </a>
                        <a href=\"#tarifs\" class=\"btn btn-outline-light btn-lg\">
                            Voir les tarifs
                        </a>
                    </div>

                    <div class=\"hero-stats\">
                        <div>
                            <div class=\"stat-value\">100%</div>
                            <div class=\"stat-label\">Symfony &amp; PHP moderne</div>
                        </div>
                        <div>
                            <div class=\"stat-value\">MVP</div>
                            <div class=\"stat-label\">Du concept au produit</div>
                        </div>
                        <div>
                            <div class=\"stat-value\">Rennes</div>
                            <div class=\"stat-label\">Bretagne &amp; à distance partout en France</div>
                        </div>
                    </div>

                </div>

                <div class=\"col-lg-5 mt-5 mt-lg-0\">
                    <div class=\"hero-card shadow-lg\">
                        <div class=\"code-window\">

                            <div class=\"code-header\">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <pre><span class=\"kw\">class</span> <span class=\"cls\">SKSystems</span>
{
    <span class=\"prop\">stack</span>: [
        <span class=\"str\">\"Symfony\"</span>,
        <span class=\"str\">\"PHP\"</span>,
        <span class=\"str\">\"JavaScript\"</span>,
        <span class=\"str\">\"API\"</span>
    ],

    <span class=\"prop\">objectif</span>:
        <span class=\"str\">\"Créer des solutions fiables\"</span>
}</pre>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id=\"services\" class=\"py-5 py-lg-6\">
        <div class=\"container\">

            <div class=\"text-center mb-5\">
                <span class=\"section-eyebrow\">Ce que je propose</span>
                <h2 class=\"fw-bold\">Mes services</h2>
                <p class=\"text-muted\">Des solutions adaptées à vos objectifs.</p>
            </div>

            <div class=\"row g-4\">

                <div class=\"col-md-4\">
                    <div class=\"service-card\">
                        <div class=\"icon\">🌐</div>
                        <h4>Sites web</h4>
                        <p>
                            Création de sites modernes, rapides et optimisés
                            pour présenter votre activité.
                        </p>
                    </div>
                </div>

                <div class=\"col-md-4\">
                    <div class=\"service-card\">
                        <div class=\"icon\">⚙️</div>
                        <h4>Applications web</h4>
                        <p>
                            Développement d\x27applications métiers,
                            plateformes et outils internes avec Symfony.
                        </p>
                    </div>
                </div>

                <div class=\"col-md-4\">
                    <div class=\"service-card\">
                        <div class=\"icon\">🚀</div>
                        <h4>MVP</h4>
                        <p>
                            Transformez votre idée en produit fonctionnel
                            et validez rapidement votre concept.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    ";
        // line 135
        yield from $this->load("partials/_projects.html.twig", 135)->unwrap()->yield($context);
        // line 136
        yield "
    ";
        // line 137
        yield from $this->load("partials/_parcours.html.twig", 137)->unwrap()->yield($context);
        // line 138
        yield "
    ";
        // line 139
        yield from $this->load("partials/_recommendations.html.twig", 139)->unwrap()->yield($context);
        // line 140
        yield "
    <section id=\"pourquoi\" class=\"py-5 py-lg-6 why-section\">
        <div class=\"container\">

            <div class=\"text-center mb-4\">
                <span class=\"section-eyebrow\">Pourquoi SK Systems ?</span>
                <h2 class=\"fw-bold\">Une approche exigeante</h2>
                <p class=\"lead text-muted mt-3\">
                    Une approche basée sur la qualité du code,
                    la performance et la simplicité.
                </p>
            </div>

            <div class=\"row g-4 text-center justify-content-center\">

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">🧩</div>
                        <h5>Code propre</h5>
                        <p>Un code lisible, testé et maintenable sur le long terme.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">⚡</div>
                        <h5>Performance</h5>
                        <p>Des applications rapides, optimisées et sécurisées.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">💬</div>
                        <h5>Communication directe</h5>
                        <p>Un interlocuteur unique, disponible du début à la livraison.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">⏱️</div>
                        <h5>Délais respectés</h5>
                        <p>Un suivi rigoureux pour livrer dans les temps annoncés.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">🤖</div>
                        <h5>IA au quotidien</h5>
                        <p>J\x27utilise l\x27IA pour accélérer certains développements — un assistant, jamais un remplaçant : conception, choix techniques et relecture restent humains.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id=\"tarifs\" class=\"py-5 py-lg-6 pricing-section\">
        <div class=\"container\">

            <div class=\"text-center mb-5\">
                <span class=\"section-eyebrow\">Tarification</span>
                <h2 class=\"fw-bold\">Intervention freelance</h2>
                <p class=\"text-muted\">
                    Développement Symfony, PHP et applications web sur mission.
                </p>
            </div>

            <div class=\"row g-4 justify-content-center\">

                <div class=\"col-md-6 col-lg-5\">
                    <div class=\"price-card featured\">
                        <span class=\"popular\">Tarif unique</span>
                        <div class=\"price-tag mt-3\">
                            300€ <span>HT / jour</span>
                        </div>
                        <ul>
                            <li>Développement Symfony &amp; PHP</li>
                            <li>Intégration front-end soignée</li>
                            <li>Suivi et communication directe</li>
                            <li>Code testé et documenté</li>
                        </ul>
                        <a href=\"#contact\" class=\"btn btn-primary btn-lg w-100\">
                            Discuter de votre projet
                        </a>
                    </div>
                </div>

                <div class=\"col-md-6 col-lg-5\">
                    <div class=\"price-card\">
                        <div class=\"price-tag mt-3\">
                            Devis <span>sur mesure</span>
                        </div>
                        <ul>
                            <li>Cadrage et chiffrage du projet</li>
                            <li>Forfait global, pas de facturation au jour</li>
                            <li>Accompagnement de bout en bout</li>
                            <li>Idéal pour les projets d\x27envergure</li>
                        </ul>
                        <a href=\"#contact\" class=\"btn btn-outline-primary btn-lg w-100\">
                            Demander un devis
                        </a>
                    </div>
                </div>

            </div>

            <div class=\"text-center mt-5\">
                <span class=\"hero-badge badge-light\">
                    Paiement par virement (Revolut) disponible
                </span>
            </div>

        </div>
    </section>

    ";
        // line 259
        yield from $this->load("partials/_contact.html.twig", 259)->unwrap()->yield($context);
        // line 260
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  367 => 260,  365 => 259,  244 => 140,  242 => 139,  239 => 138,  237 => 137,  234 => 136,  232 => 135,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block title %}SK Systems - Développement web & solutions digitales{% endblock %}

{% block body %}

    <section class=\"hero-section\">
        <div class=\"container\">
            <div class=\"row align-items-center min-vh-75\">

                <div class=\"col-lg-7\">

                    <span class=\"hero-badge mb-3\">
                        <span class=\"dot\"></span>
                        Disponible pour de nouvelles missions
                    </span>

                    <h1 class=\"display-3 fw-bold text-white mt-3\">
                        Créons des solutions web
                        <span class=\"text-primary\">performantes</span>
                    </h1>

                    <p class=\"lead text-light opacity-75 mt-4\">
                        SK Systems accompagne les entreprises et entrepreneurs
                        dans la création de sites web, applications métiers
                        et MVP sur mesure avec Symfony, PHP et JavaScript.
                    </p>

                    <div class=\"mt-4\">
                        <a href=\"#services\" class=\"btn btn-primary btn-lg me-3\">
                            Découvrir mes services
                        </a>
                        <a href=\"#tarifs\" class=\"btn btn-outline-light btn-lg\">
                            Voir les tarifs
                        </a>
                    </div>

                    <div class=\"hero-stats\">
                        <div>
                            <div class=\"stat-value\">100%</div>
                            <div class=\"stat-label\">Symfony &amp; PHP moderne</div>
                        </div>
                        <div>
                            <div class=\"stat-value\">MVP</div>
                            <div class=\"stat-label\">Du concept au produit</div>
                        </div>
                        <div>
                            <div class=\"stat-value\">Rennes</div>
                            <div class=\"stat-label\">Bretagne &amp; à distance partout en France</div>
                        </div>
                    </div>

                </div>

                <div class=\"col-lg-5 mt-5 mt-lg-0\">
                    <div class=\"hero-card shadow-lg\">
                        <div class=\"code-window\">

                            <div class=\"code-header\">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <pre><span class=\"kw\">class</span> <span class=\"cls\">SKSystems</span>
{
    <span class=\"prop\">stack</span>: [
        <span class=\"str\">\"Symfony\"</span>,
        <span class=\"str\">\"PHP\"</span>,
        <span class=\"str\">\"JavaScript\"</span>,
        <span class=\"str\">\"API\"</span>
    ],

    <span class=\"prop\">objectif</span>:
        <span class=\"str\">\"Créer des solutions fiables\"</span>
}</pre>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id=\"services\" class=\"py-5 py-lg-6\">
        <div class=\"container\">

            <div class=\"text-center mb-5\">
                <span class=\"section-eyebrow\">Ce que je propose</span>
                <h2 class=\"fw-bold\">Mes services</h2>
                <p class=\"text-muted\">Des solutions adaptées à vos objectifs.</p>
            </div>

            <div class=\"row g-4\">

                <div class=\"col-md-4\">
                    <div class=\"service-card\">
                        <div class=\"icon\">🌐</div>
                        <h4>Sites web</h4>
                        <p>
                            Création de sites modernes, rapides et optimisés
                            pour présenter votre activité.
                        </p>
                    </div>
                </div>

                <div class=\"col-md-4\">
                    <div class=\"service-card\">
                        <div class=\"icon\">⚙️</div>
                        <h4>Applications web</h4>
                        <p>
                            Développement d\x27applications métiers,
                            plateformes et outils internes avec Symfony.
                        </p>
                    </div>
                </div>

                <div class=\"col-md-4\">
                    <div class=\"service-card\">
                        <div class=\"icon\">🚀</div>
                        <h4>MVP</h4>
                        <p>
                            Transformez votre idée en produit fonctionnel
                            et validez rapidement votre concept.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {% include \x27partials/_projects.html.twig\x27 %}

    {% include \x27partials/_parcours.html.twig\x27 %}

    {% include \x27partials/_recommendations.html.twig\x27 %}

    <section id=\"pourquoi\" class=\"py-5 py-lg-6 why-section\">
        <div class=\"container\">

            <div class=\"text-center mb-4\">
                <span class=\"section-eyebrow\">Pourquoi SK Systems ?</span>
                <h2 class=\"fw-bold\">Une approche exigeante</h2>
                <p class=\"lead text-muted mt-3\">
                    Une approche basée sur la qualité du code,
                    la performance et la simplicité.
                </p>
            </div>

            <div class=\"row g-4 text-center justify-content-center\">

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">🧩</div>
                        <h5>Code propre</h5>
                        <p>Un code lisible, testé et maintenable sur le long terme.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">⚡</div>
                        <h5>Performance</h5>
                        <p>Des applications rapides, optimisées et sécurisées.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">💬</div>
                        <h5>Communication directe</h5>
                        <p>Un interlocuteur unique, disponible du début à la livraison.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">⏱️</div>
                        <h5>Délais respectés</h5>
                        <p>Un suivi rigoureux pour livrer dans les temps annoncés.</p>
                    </div>
                </div>

                <div class=\"col-6 col-lg-3\">
                    <div class=\"feature-item\">
                        <div class=\"icon\">🤖</div>
                        <h5>IA au quotidien</h5>
                        <p>J\x27utilise l\x27IA pour accélérer certains développements — un assistant, jamais un remplaçant : conception, choix techniques et relecture restent humains.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id=\"tarifs\" class=\"py-5 py-lg-6 pricing-section\">
        <div class=\"container\">

            <div class=\"text-center mb-5\">
                <span class=\"section-eyebrow\">Tarification</span>
                <h2 class=\"fw-bold\">Intervention freelance</h2>
                <p class=\"text-muted\">
                    Développement Symfony, PHP et applications web sur mission.
                </p>
            </div>

            <div class=\"row g-4 justify-content-center\">

                <div class=\"col-md-6 col-lg-5\">
                    <div class=\"price-card featured\">
                        <span class=\"popular\">Tarif unique</span>
                        <div class=\"price-tag mt-3\">
                            300€ <span>HT / jour</span>
                        </div>
                        <ul>
                            <li>Développement Symfony &amp; PHP</li>
                            <li>Intégration front-end soignée</li>
                            <li>Suivi et communication directe</li>
                            <li>Code testé et documenté</li>
                        </ul>
                        <a href=\"#contact\" class=\"btn btn-primary btn-lg w-100\">
                            Discuter de votre projet
                        </a>
                    </div>
                </div>

                <div class=\"col-md-6 col-lg-5\">
                    <div class=\"price-card\">
                        <div class=\"price-tag mt-3\">
                            Devis <span>sur mesure</span>
                        </div>
                        <ul>
                            <li>Cadrage et chiffrage du projet</li>
                            <li>Forfait global, pas de facturation au jour</li>
                            <li>Accompagnement de bout en bout</li>
                            <li>Idéal pour les projets d\x27envergure</li>
                        </ul>
                        <a href=\"#contact\" class=\"btn btn-outline-primary btn-lg w-100\">
                            Demander un devis
                        </a>
                    </div>
                </div>

            </div>

            <div class=\"text-center mt-5\">
                <span class=\"hero-badge badge-light\">
                    Paiement par virement (Revolut) disponible
                </span>
            </div>

        </div>
    </section>

    {% include \x27partials/_contact.html.twig\x27 %}

{% endblock %}
", "home/index.html.twig", "/var/www/sksystems/templates/home/index.html.twig");
    }
}
