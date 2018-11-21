<?php

/**
 *
 * Flextype Snippet Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Flextype\Component\{Event\Event, Filesystem\Filesystem};

// Event: onShortcodesInitialized
Event::addListener('onShortcodesInitialized', function () {

    // Shortcode: [snippet name=snippet-name]
    Content::shortcode()->addHandler('snippet', function(ShortcodeInterface $s) {
        return Snippet::get($s->getParameter('name'));
    });
});

class Snippet
{
    /**
     * Get snippet
     *
     * Snippet::get('snippet-name');
     *
     * @access public
     * @param  string  $snippet_name  Snippet name
     * @return void
     */
    public static function get($snippet_name)
    {
        $snippet_path = PATH['site'] . '/snippets/' . $snippet_name . '.php';

        if (Filesystem::fileExists($snippet_path)) {
            // Turn on output buffering
            ob_start();

            // Include view file
            include $snippet_path;

            // Output...
            return ob_get_clean();
        } else {
            throw new \RuntimeException("Snippet {$snippet_path} does not exist.");
        }
    }
}
