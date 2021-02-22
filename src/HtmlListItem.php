<?php

namespace Exolnet\HtmlList;

use Collective\Html\FormFacade;
use Exolnet\HtmlList\Items\HtmlItem;
use Illuminate\Support\HtmlString;

class HtmlListItem
{
    /**
     * @var int|string|null
     */
    protected $key;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var \Exolnet\HtmlList\Items\HtmlItem
     */
    protected $htmlItem;

    /**
     * @param string $label
     * @param string|int|null $key
     */
    public function __construct(string $label, $key = null)
    {
        $this
            ->setLabel($label)
            ->setKey($key);
    }

    /**
     * @return string|int|null
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string|int|null $key
     * @return $this
     */
    public function setKey($key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return \Exolnet\HtmlList\Items\HtmlItem
     */
    public function getHtmlItem(): HtmlItem
    {
        return $this->htmlItem;
    }

    /**
     * @param \Exolnet\HtmlList\Items\HtmlItem $htmlItem
     * @return $this
     */
    public function setHtmlItem(HtmlItem $htmlItem): self
    {
        $this->htmlItem = $htmlItem;

        return $this;
    }

    /**
     * @param string $name
     * @param bool $checked
     * @param array $options
     * @return \Illuminate\Support\HtmlString
     */
    public function checkbox(string $name, ?bool $checked = null, array $options = []): HtmlString
    {
        return FormFacade::checkbox($name, $this->getKey(), $checked, $options);
    }

    /**
     * @param string $name
     * @param bool $checked
     * @param array $options
     * @return \Illuminate\Support\HtmlString
     */
    public function radio(string $name, ?bool $checked = null, array $options = []): HtmlString
    {
        return FormFacade::radio($name, $this->getKey(), $checked, $options);
    }
}
