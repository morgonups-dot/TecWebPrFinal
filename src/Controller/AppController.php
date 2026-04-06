<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\I18n;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        
        $session = $this->request->getSession();
        $user = $session->read('Auth.User');
        $this->set('user', $user);
        
        $this->_setLanguage($session, $user);
    }

    protected function _setLanguage($session, $user = null)
    {
        $lang = $session->read('Config.language');
        
        if (!$lang && $user && isset($user['idioma_preferido'])) {
            $lang = $user['idioma_preferido'];
        }
        
        if (!$lang) {
            $lang = 'es';
        }
        
        $session->write('Config.language', $lang);
        I18n::setLocale($lang);
    }

    protected function isLoggedIn(): bool
    {
        $session = $this->request->getSession();
        return $session->read('Auth.User') !== null;
    }

    public function changeLanguage($lang)
    {
        $session = $this->request->getSession();
        $session->write('Config.language', $lang);
        I18n::setLocale($lang);
        
        return $this->redirect($this->request->referer());
    }
}