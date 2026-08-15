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

/* base.html.twig */
class __TwigTemplate_a6015f94963bab9a2aec671e4536ea7f extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'meta_description' => [$this, 'block_meta_description'],
            'og_type' => [$this, 'block_og_type'],
            'og_title' => [$this, 'block_og_title'],
            'og_image' => [$this, 'block_og_image'],
            'structured_data' => [$this, 'block_structured_data'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
    <html lang=\"fr\">

    <head>

        <meta charset=\"UTF-8\">

        <title>
            ";
        // line 9
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 10
        yield "        </title>

        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"";
        // line 13
        yield from $this->unwrap()->yieldBlock('meta_description', $context, $blocks);
        yield "\">
        <link rel=\"canonical\" href=\"";
        // line 14
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "request", [], "any", false, false, false, 14), "schemeAndHttpHost", [], "any", false, false, false, 14) . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "request", [], "any", false, false, false, 14), "pathInfo", [], "any", false, false, false, 14)), "html", null, true);
        yield "\">
        <link rel=\"icon\" href=\"";
        // line 15
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logos/sk-favicon-clair.png"), "html", null, true);
        yield "\" type=\"image/png\">

        <meta property=\"og:type\" content=\"";
        // line 17
        yield from $this->unwrap()->yieldBlock('og_type', $context, $blocks);
        yield "\">
        <meta property=\"og:site_name\" content=\"SK Systems\">
        <meta property=\"og:locale\" content=\"fr_FR\">
        <meta property=\"og:url\" content=\"";
        // line 20
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "request", [], "any", false, false, false, 20), "schemeAndHttpHost", [], "any", false, false, false, 20) . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "request", [], "any", false, false, false, 20), "pathInfo", [], "any", false, false, false, 20)), "html", null, true);
        yield "\">
        <meta property=\"og:title\" content=\"";
        // line 21
        yield from $this->unwrap()->yieldBlock('og_title', $context, $blocks);
        yield "\">
        <meta property=\"og:description\" content=\"";
        // line 22
        yield from         $this->unwrap()->yieldBlock("meta_description", $context, $blocks);
        yield "\">
        <meta property=\"og:image\" content=\"";
        // line 23
        yield from $this->unwrap()->yieldBlock('og_image', $context, $blocks);
        yield "\">

        <meta name=\"twitter:card\" content=\"summary_large_image\">
        <meta name=\"twitter:title\" content=\"";
        // line 26
        yield from         $this->unwrap()->yieldBlock("og_title", $context, $blocks);
        yield "\">
        <meta name=\"twitter:description\" content=\"";
        // line 27
        yield from         $this->unwrap()->yieldBlock("meta_description", $context, $blocks);
        yield "\">
        <meta name=\"twitter:image\" content=\"";
        // line 28
        yield from         $this->unwrap()->yieldBlock("og_image", $context, $blocks);
        yield "\">

        ";
        // line 30
        yield from $this->unwrap()->yieldBlock('structured_data', $context, $blocks);
        // line 57
        yield "
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap\" rel=\"stylesheet\">

        ";
        // line 62
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 65
        yield "
    </head>

    <body>

        ";
        // line 70
        yield from $this->load("partials/_navbar.html.twig", 70)->unwrap()->yield($context);
        // line 71
        yield "
        <main>

            ";
        // line 74
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 75
        yield "
        </main>

        ";
        // line 78
        yield from $this->load("partials/_footer.html.twig", 78)->unwrap()->yield($context);
        // line 79
        yield "
        ";
        // line 80
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 85
        yield "
    </body>

</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 9
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

        yield "SK Systems";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        yield "SK Systems - Développeur Symfony freelance : sites web, applications métiers et MVP sur mesure.";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 17
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_type(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_type"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_type"));

        yield "website";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 21
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_title"));

        yield "SK Systems - Développement web & solutions digitales";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 23
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_image(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_image"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_image"));

        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logos/sk-logo-sur-accent.png")), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_structured_data(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "structured_data"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "structured_data"));

        // line 31
        yield "        <script type=\"application/ld+json\">
        {
            \"@context\": \"https://schema.org\",
            \"@type\": \"ProfessionalService\",
            \"name\": \"SK Systems\",
            \"image\": \"";
        // line 36
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logos/sk-logo-sur-accent.png")), "html", null, true);
        yield "\",
            \"url\": \"";
        // line 37
        yield (string) $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "request", [], "any", false, false, false, 37), "schemeAndHttpHost", [], "any", false, false, false, 37), "html", null, true);
        yield "/\",
            \"email\": \"samy.elkniez@sksystems.fr\",
            \"telephone\": \"+33755464376\",
            \"priceRange\": \"300 EUR/jour\",
            \"founder\": {
                \"@type\": \"Person\",
                \"name\": \"Samy EL KNIEZ\"
            },
            \"address\": {
                \"@type\": \"PostalAddress\",
                \"streetAddress\": \"14 Square de Tanouarn\",
                \"postalCode\": \"35700\",
                \"addressLocality\": \"Rennes\",
                \"addressCountry\": \"FR\"
            },
            \"areaServed\": \"France\",
            \"description\": \"Développeur Symfony freelance : sites web, applications métiers et MVP sur mesure.\"
        }
        </script>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 62
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 63
        yield "            ";
        yield (string) $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("app");
        yield "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 74
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 80
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 81
        yield "
            ";
        // line 82
        yield (string) $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("app");
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
        return "base.html.twig";
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
        return array (  414 => 82,  411 => 81,  398 => 80,  376 => 74,  362 => 63,  349 => 62,  318 => 37,  314 => 36,  307 => 31,  294 => 30,  271 => 23,  248 => 21,  225 => 17,  202 => 13,  179 => 9,  164 => 85,  162 => 80,  159 => 79,  157 => 78,  152 => 75,  150 => 74,  145 => 71,  143 => 70,  136 => 65,  134 => 62,  127 => 57,  125 => 30,  120 => 28,  116 => 27,  112 => 26,  106 => 23,  102 => 22,  98 => 21,  94 => 20,  88 => 17,  83 => 15,  79 => 14,  75 => 13,  70 => 10,  68 => 9,  58 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
    <html lang=\"fr\">

    <head>

        <meta charset=\"UTF-8\">

        <title>
            {% block title %}SK Systems{% endblock %}
        </title>

        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"{% block meta_description %}SK Systems - Développeur Symfony freelance : sites web, applications métiers et MVP sur mesure.{% endblock %}\">
        <link rel=\"canonical\" href=\"{{ app.request.schemeAndHttpHost ~ app.request.pathInfo }}\">
        <link rel=\"icon\" href=\"{{ asset(\x27images/logos/sk-favicon-clair.png\x27) }}\" type=\"image/png\">

        <meta property=\"og:type\" content=\"{% block og_type %}website{% endblock %}\">
        <meta property=\"og:site_name\" content=\"SK Systems\">
        <meta property=\"og:locale\" content=\"fr_FR\">
        <meta property=\"og:url\" content=\"{{ app.request.schemeAndHttpHost ~ app.request.pathInfo }}\">
        <meta property=\"og:title\" content=\"{% block og_title %}SK Systems - Développement web & solutions digitales{% endblock %}\">
        <meta property=\"og:description\" content=\"{{ block(\x27meta_description\x27) }}\">
        <meta property=\"og:image\" content=\"{% block og_image %}{{ absolute_url(asset(\x27images/logos/sk-logo-sur-accent.png\x27)) }}{% endblock %}\">

        <meta name=\"twitter:card\" content=\"summary_large_image\">
        <meta name=\"twitter:title\" content=\"{{ block(\x27og_title\x27) }}\">
        <meta name=\"twitter:description\" content=\"{{ block(\x27meta_description\x27) }}\">
        <meta name=\"twitter:image\" content=\"{{ block(\x27og_image\x27) }}\">

        {% block structured_data %}
        <script type=\"application/ld+json\">
        {
            \"@context\": \"https://schema.org\",
            \"@type\": \"ProfessionalService\",
            \"name\": \"SK Systems\",
            \"image\": \"{{ absolute_url(asset(\x27images/logos/sk-logo-sur-accent.png\x27)) }}\",
            \"url\": \"{{ app.request.schemeAndHttpHost }}/\",
            \"email\": \"samy.elkniez@sksystems.fr\",
            \"telephone\": \"+33755464376\",
            \"priceRange\": \"300 EUR/jour\",
            \"founder\": {
                \"@type\": \"Person\",
                \"name\": \"Samy EL KNIEZ\"
            },
            \"address\": {
                \"@type\": \"PostalAddress\",
                \"streetAddress\": \"14 Square de Tanouarn\",
                \"postalCode\": \"35700\",
                \"addressLocality\": \"Rennes\",
                \"addressCountry\": \"FR\"
            },
            \"areaServed\": \"France\",
            \"description\": \"Développeur Symfony freelance : sites web, applications métiers et MVP sur mesure.\"
        }
        </script>
        {% endblock %}

        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap\" rel=\"stylesheet\">

        {% block stylesheets %}
            {{ encore_entry_link_tags(\x27app\x27) }}
        {% endblock %}

    </head>

    <body>

        {% include \x27partials/_navbar.html.twig\x27 %}

        <main>

            {% block body %}{% endblock %}

        </main>

        {% include \x27partials/_footer.html.twig\x27 %}

        {% block javascripts %}

            {{ encore_entry_script_tags(\x27app\x27) }}

        {% endblock %}

    </body>

</html>
", "base.html.twig", "/var/www/sksystems/templates/base.html.twig");
    }
}
