<?php

/* /Applications/MAMP/htdocs/NPHoriginal/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig */
class __TwigTemplate_7da84432f4d0499aa348ab6626312c59ec0ad7760fa1870758eb05e0946dcfd3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 18
        $context["isController"] = (twig_lower_filter($this->env, ($context["type"] ?? null)) == "controller");
        // line 19
        $context["isShell"] = (twig_lower_filter($this->env, ($context["type"] ?? null)) == "shell");
        // line 20
        $context["isCommand"] = (twig_lower_filter($this->env, ($context["type"] ?? null)) == "command");
        // line 21
        if (($context["isController"] ?? null)) {
            // line 22
            $context["superClassName"] = "IntegrationTestCase";
        } elseif ((        // line 23
($context["isShell"] ?? null) || ($context["isCommand"] ?? null))) {
            // line 24
            $context["superClassName"] = "ConsoleIntegrationTestCase";
        } else {
            // line 26
            $context["superClassName"] = "TestCase";
        }
        // line 28
        $context["uses"] = twig_array_merge(($context["uses"] ?? null), array(0 => ("Cake\\TestSuite\\" . ($context["superClassName"] ?? null))));
        // line 30
        $context["uses"] = twig_sort_filter(($context["uses"] ?? null));
        // line 31
        echo "<?php
namespace ";
        // line 32
        echo twig_escape_filter($this->env, ($context["baseNamespace"] ?? null), "html", null, true);
        echo "\\Test\\TestCase\\";
        echo twig_escape_filter($this->env, ($context["subNamespace"] ?? null), "html", null, true);
        echo ";

";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["uses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dependency"]) {
            // line 35
            echo "use ";
            echo twig_escape_filter($this->env, $context["dependency"], "html", null, true);
            echo ";
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dependency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "
/**
 * ";
        // line 39
        echo twig_escape_filter($this->env, ($context["fullClassName"] ?? null), "html", null, true);
        echo " Test Case
 */
class ";
        // line 41
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "Test extends ";
        echo twig_escape_filter($this->env, ($context["superClassName"] ?? null), "html", null, true);
        echo "
{
";
        // line 43
        if (($context["properties"] ?? null)) {
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["properties"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["propertyInfo"]) {
                // line 45
                echo "
    /**
     * ";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "description", array()), "html", null, true);
                echo "
     *
     * @var ";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "type", array()), "html", null, true);
                echo "
     */
    public \$";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "name", array()), "html", null, true);
                if (($this->getAttribute($context["propertyInfo"], "value", array(), "any", true, true) && $this->getAttribute($context["propertyInfo"], "value", array()))) {
                    echo " = ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "value", array()), "html", null, true);
                }
                echo ";
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['propertyInfo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 55
        if (($context["fixtures"] ?? null)) {
            // line 56
            echo "
    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [";
            // line 62
            echo $this->getAttribute(($context["Bake"] ?? null), "stringifyList", array(0 => $this->env->getExtension('Jasny\Twig\ArrayExtension')->values(($context["fixtures"] ?? null))), "method");
            echo "];
";
        }
        // line 65
        if (($context["construction"] ?? null)) {
            // line 66
            echo "
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
";
            // line 75
            if (($context["preConstruct"] ?? null)) {
                // line 76
                echo "        ";
                echo ($context["preConstruct"] ?? null);
                echo "
";
            }
            // line 78
            if (($context["isCommand"] ?? null)) {
                // line 79
                echo "        ";
                echo ($context["construction"] ?? null);
                echo "
";
            } else {
                // line 81
                echo "        \$this->";
                echo ((($context["subject"] ?? null) . " = ") . ($context["construction"] ?? null));
                echo "
";
            }
            // line 83
            if (($context["postConstruct"] ?? null)) {
                // line 84
                echo "        ";
                echo ($context["postConstruct"] ?? null);
                echo "
";
            }
            // line 86
            echo "    }
";
            // line 87
            if ( !($context["isCommand"] ?? null)) {
                // line 88
                echo "
    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->";
                // line 96
                echo twig_escape_filter($this->env, ($context["subject"] ?? null), "html", null, true);
                echo ");

        parent::tearDown();
    }
";
            }
        }
        // line 103
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["methods"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 104
            echo "
    /**
     * Test ";
            // line 106
            echo twig_escape_filter($this->env, $context["method"], "html", null, true);
            echo " method
     *
     * @return void
     */
    public function test";
            // line 110
            echo twig_escape_filter($this->env, Cake\Utility\Inflector::camelize($context["method"]), "html", null, true);
            echo "()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        if ( !($context["methods"] ?? null)) {
            // line 117
            echo "
    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        // line 128
        echo "}
";
    }

    public function getTemplateName()
    {
        return "/Applications/MAMP/htdocs/NPHoriginal/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 128,  223 => 117,  221 => 116,  210 => 110,  203 => 106,  199 => 104,  195 => 103,  186 => 96,  176 => 88,  174 => 87,  171 => 86,  165 => 84,  163 => 83,  157 => 81,  151 => 79,  149 => 78,  143 => 76,  141 => 75,  130 => 66,  128 => 65,  123 => 62,  115 => 56,  113 => 55,  100 => 51,  95 => 49,  90 => 47,  86 => 45,  82 => 44,  80 => 43,  73 => 41,  68 => 39,  64 => 37,  55 => 35,  51 => 34,  44 => 32,  41 => 31,  39 => 30,  37 => 28,  34 => 26,  31 => 24,  29 => 23,  27 => 22,  25 => 21,  23 => 20,  21 => 19,  19 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * Test Case bake template
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{% set isController = type|lower == 'controller' %}
{% set isShell = type|lower == 'shell' %}
{% set isCommand = type|lower == 'command' %}
{% if isController %}
    {%- set superClassName = 'IntegrationTestCase' %}
{% elseif isShell or isCommand %}
    {%- set superClassName = 'ConsoleIntegrationTestCase' %}
{% else %}
    {%- set superClassName = 'TestCase' %}
{% endif %}
{%- set uses = uses|merge([\"Cake\\\\TestSuite\\\\#{superClassName}\"]) %}

{%- set uses = uses|sort %}
<?php
namespace {{ baseNamespace }}\\Test\\TestCase\\{{ subNamespace }};

{% for dependency in uses %}
use {{ dependency }};
{% endfor %}

/**
 * {{ fullClassName }} Test Case
 */
class {{ className }}Test extends {{ superClassName }}
{
{% if properties %}
{% for propertyInfo in properties %}

    /**
     * {{ propertyInfo.description }}
     *
     * @var {{ propertyInfo.type }}
     */
    public \${{ propertyInfo.name }}{% if propertyInfo.value is defined and propertyInfo.value %} = {{ propertyInfo.value }}{% endif %};
{% endfor %}
{% endif %}

{%- if fixtures %}

    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [{{ Bake.stringifyList(fixtures|values)|raw }}];
{% endif %}

{%- if construction %}

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
{% if preConstruct %}
        {{ preConstruct|raw }}
{% endif %}
{% if isCommand %}
        {{ construction|raw }}
{% else %}
        \$this->{{ (subject ~ ' = ' ~ construction)|raw }}
{% endif %}
{% if postConstruct %}
        {{ postConstruct|raw }}
{% endif %}
    }
{% if not isCommand %}

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->{{ subject }});

        parent::tearDown();
    }
{% endif %}
{% endif %}

{%- for method in methods %}

    /**
     * Test {{ method }} method
     *
     * @return void
     */
    public function test{{ method|camelize }}()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endfor %}

{%- if not methods %}

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endif %}
}
", "/Applications/MAMP/htdocs/NPHoriginal/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig", "/Applications/MAMP/htdocs/NPHoriginal/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig");
    }
}
