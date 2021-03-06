<?php

namespace SlyDeath\Spaceless;

class BladeDirectives
{
    /**
     * Директива @spaceless
     */
    public function spaceless()
    {
        if ($this->isEnabled()) {
            ob_start();
        }
    }

    /**
     * Директива @endspaceless
     *
     * @return string|null
     *
     * @throws \Exception
     */
    public function endSpaceless()
    {
        if ($this->isEnabled()) {

            $buffer = ob_get_clean();
            $expelled_tags = implode('|', config('spaceless.expelled_tags', []));

            // Все пробелы/переносы конвертируются в одинарный
            $regexp = '~(?>[^\S]\s*|\s{2,})(?=[^<]*+(?:<(?!/?(?:' . $expelled_tags . ')\b)[^<]*+)*+(?:<(?>' . $expelled_tags . ')\b|\z))~Six';
            $result = preg_replace($regexp, ' ', $buffer);

            return ($result !== null) ? $result : $buffer;
        }

        return null;
    }

    /**
     * Минификация включена в этой среде?
     *
     * @return bool
     */
    public function isEnabled()
    {
        return !in_array(app('env'), config('spaceless.expelled_env', []), true);
    }
}
