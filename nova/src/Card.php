<?php

namespace Laravel\Nova;

abstract class Card extends Element
{
    public const FULL_WIDTH = 'full';
    public const ONE_THIRD_WIDTH = '1/3';
    public const ONE_HALF_WIDTH = '1/2';
    public const ONE_QUARTER_WIDTH = '1/4';
    public const TWO_THIRDS_WIDTH = '2/3';
    public const THREE_QUARTERS_WIDTH = '3/4';

    /**
     * The width of the card (1/3, 2/3, 1/2, 1/4, 3/4, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Set the width of the card.
     *
     * @param  string  $width
     * @return $this
     */
    public function width($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge([
            'width' => $this->width,
        ], parent::jsonSerialize());
    }
}
