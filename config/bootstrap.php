<?php

namespace Croogo\Allinoneaccessibility\Config;

use Cake\Event\EventInterface;
use Croogo\Core\Event\EventManager;
use Croogo\Core\Nav as CroogoNav;



// CroogoNav::add('sidebar', 'extensions.children.Allinoneaccessibility', [
//     'title' => 'All in One Accessibility',
//     'url' => "https://typo3.skynettechnologies.us/typo13/index.php?url=" . $_SERVER['HTTP_HOST'],
//     'options' => [
//         'escape' => true,
//         'htmlAttributes' => [
//             'target' => '_blank'
//         ]
//     ],
// ]);


CroogoNav::add('sidebar', 'allinoneaccessibility', [
    'icon' => 'cog',
    'title' => __('All in One Accessibility'),
    'url' => [
        'prefix' => 'admin',
        'plugin' => 'Allinoneaccessibility',
        'controller' => 'Settings',
        'action' => 'index',
    ],
    'weight' => 30,
]);

EventManager::instance()->on('View.beforeRender', function (EventInterface $event) {
    /** @var \Cake\View\View $view */
    $view = $event->getSubject();

    // Check if we're in admin area (prefix = 'Admin')
    if ($view->getRequest()->getParam('prefix') === 'Admin') {
        return; // skip injection for admin
    }

    // Add your script (this will push it into the <script> block)
    $view->Html->script('https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=#420083&token=&position=bottom_right', ['block' => true]);
});
