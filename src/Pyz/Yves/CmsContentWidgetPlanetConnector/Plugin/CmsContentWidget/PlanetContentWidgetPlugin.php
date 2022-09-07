<?php

namespace Pyz\Yves\CmsContentWidgetPlanetConnector\Plugin\CmsContentWidget;

use Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface;
use Spryker\Yves\CmsContentWidget\Dependency\CmsContentWidgetPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Twig\Environment as Twig_Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * @method \Pyz\Yves\CmsContentWidgetPlanetConnector\CmsContentWidgetPlanetConnectorFactory getFactory()
 */
class PlanetContentWidgetPlugin extends AbstractPlugin implements CmsContentWidgetPluginInterface
{
    /**
     * @var CmsContentWidgetConfigurationProviderInterface
     */
    protected $widgetConfiguration;

    public function __construct(CmsContentWidgetConfigurationProviderInterface $widgetConfiguration)
    {
        $this->widgetConfiguration = $widgetConfiguration;
    }

    /**
     * @return callable
     */
    public function getContentWidgetFunction(): callable
    {
        return [$this, 'contentWidgetFunction'];
    }

    /**
     * @param Twig_Environment $twig
     * @param array $context
     * @param array $names
     * @param $templateIdentifier
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError|ContainerKeyNotFoundException
     */
    public function contentWidgetFunction(
        Twig_Environment $twig,
        array $context,
        array $names,
        $templateIdentifier = null
    ): string {
        $templatePath = $this->resolveTemplatePath($templateIdentifier);

        return $twig->render($templatePath, [
            'planet' => $this->getFactory()->getPlanetClient()->getPlanetByName($names[0])
        ]);
    }

    protected function resolveTemplatePath(?string $templateIdentifier = null): string
    {
        $availableTemplates = $this->widgetConfiguration->getAvailableTemplates();
        if (!$templateIdentifier || !array_key_exists($templateIdentifier, $availableTemplates)) {
            $templateIdentifier = CmsContentWidgetConfigurationProviderInterface::DEFAULT_TEMPLATE_IDENTIFIER;
        }

        return $availableTemplates[$templateIdentifier];
    }
}
