<?php

namespace Interop\Template\Latte;

use Interop\Template\TemplateEngineInterface;
use Interop\Template\Exception\TemplateNotFound;
use Interop\Template\Exception\TemplateExceptionInterface;
use Latte\Engine as Latte;
use Exception;

final class LatteEngine implements TemplateEngineInterface
{
    /** @var Latte */
    private $latte;

    /** @var string */
    private $suffix;

    public function __construct(Latte $latte, string $suffix = '')
    {
        $this->latte   = $latte;
        $this->suffix = $suffix;
    }

    /**
     * @param string $templateName
     * @param array $parameters
     * @return string
     * @throws TemplateExceptionInterface
     */
    public function render(string $templateName, array $parameters = []): string
    {
        try {
            return $this->latte->renderToString($templateName . $this->suffix, $parameters);
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'Missing template') === 0) {
                throw TemplateNotFound::fromName($templateName, 0, $e);
            }
         }
    }
}
