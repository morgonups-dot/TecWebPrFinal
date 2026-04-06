<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\I18n\I18n;

class UsersController extends AppController
{
    public function login()
    {
        $session = $this->request->getSession();
        
        if ($session->read('Auth.User')) {
            return $this->redirect('/users');
        }

        if ($this->request->is('post')) {
            $username = $this->request->getData('username');
            $password = $this->request->getData('password');

            if (empty($username) || empty($password)) {
                $this->Flash->error(__('Please enter your credentials'));
                return $this->redirect(['action' => 'login']);
            }

            $user = $this->Users
                ->find()
                ->where(['correo_electronico' => $username])
                ->first();

            if ($user) {
                $hasher = new DefaultPasswordHasher([
                    'hashType' => 'bcrypt'
                ]);
                $passwordMatch = $hasher->check($password, $user->password);
                
                if (!$passwordMatch && $user->password === $password) {
                    $passwordMatch = true;
                }

                if ($passwordMatch) {
                    $session->write('Auth.User', [
                        'id' => $user->id,
                        'nombres' => $user->nombres,
                        'apellido_paterno' => $user->apellido_paterno,
                        'apellido_materno' => $user->apellido_materno,
                        'correo_electronico' => $user->correo_electronico,
                        'departamento' => $user->departamento,
                        'sexo' => $user->sexo,
                        'es_administrador' => $user->es_administrador,
                        'idioma_preferido' => $user->idioma_preferido,
                    ]);

                    if ($user->idioma_preferido) {
                        $session->write('Config.language', $user->idioma_preferido);
                        I18n::setLocale($user->idioma_preferido);
                    }

                    return $this->redirect('/users');
                }
            }

            $this->Flash->error(__('Username or password incorrect'));
        }
    }

    public function logout()
    {
        $session = $this->request->getSession();
        $session->delete('Auth');
        return $this->redirect('/login');
    }

    public function changeLanguage($lang)
    {
        $session = $this->request->getSession();
        $session->write('Config.language', $lang);
        I18n::setLocale($lang);
        
        return $this->redirect($this->request->referer());
    }

    public function index()
    {
        $session = $this->request->getSession();
        if (!$session->read('Auth.User')) {
            return $this->redirect('/login');
        }

        $searchField = $this->request->getQuery('field', 'nombres');
        $searchQuery = $this->request->getQuery('q', '');

        $query = $this->Users->find();

        if (!empty($searchQuery)) {
            $conditions = [];
            
            switch ($searchField) {
                case 'id':
                    if (is_numeric($searchQuery)) {
                        $conditions['id'] = (int)$searchQuery;
                    }
                    break;
                case 'nombres':
                    $conditions['nombres LIKE'] = '%' . $searchQuery . '%';
                    break;
                case 'apellido_paterno':
                    $conditions['apellido_paterno LIKE'] = '%' . $searchQuery . '%';
                    break;
                case 'apellido_materno':
                    $conditions['apellido_materno LIKE'] = '%' . $searchQuery . '%';
                    break;
                case 'ci':
                    $conditions['ci LIKE'] = '%' . $searchQuery . '%';
                    break;
                case 'correo_electronico':
                    $conditions['correo_electronico LIKE'] = '%' . $searchQuery . '%';
                    break;
                case 'departamento':
                    $conditions['departamento LIKE'] = '%' . $searchQuery . '%';
                    break;
                case 'sexo':
                    $conditions['sexo'] = strtoupper($searchQuery);
                    break;
                case 'telefono':
                    $conditions['telefono LIKE'] = '%' . $searchQuery . '%';
                    break;
                case 'es_administrador':
                    $search = strtolower($searchQuery);
                    if ($search === 'admin' || $search === '1' || $search === 'si' || $search === 'yes') {
                        $conditions['es_administrador'] = 1;
                    } elseif ($search === 'user' || $search === '0' || $search === 'no' || $search === 'no') {
                        $conditions['es_administrador'] = 0;
                    }
                    break;
                case 'idioma_preferido':
                    $conditions['idioma_preferido'] = $searchQuery;
                    break;
            }

            if (!empty($conditions)) {
                $query->where($conditions);
            }
        }

        $users = $this->paginate($query);

        $this->set(compact('users', 'searchField', 'searchQuery'));
    }

    public function view($id = null)
    {
        $session = $this->request->getSession();
        $authUser = $session->read('Auth.User');
        
        if (!$authUser) {
            return $this->redirect('/login');
        }

        if (!$authUser['es_administrador'] && $authUser['id'] != $id) {
            $this->Flash->error(__('You do not have permission to view this profile'));
            return $this->redirect('/users');
        }

        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    public function add()
    {
        $session = $this->request->getSession();
        $authUser = $session->read('Auth.User');
        
        if (!$authUser || !$authUser['es_administrador']) {
            $this->Flash->error(__('You do not have permission to perform this action'));
            return $this->redirect('/users');
        }

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            if (!empty($data['password'])) {
                $hasher = new DefaultPasswordHasher();
                $data['password'] = $hasher->hash($data['password']);
            }
            
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again'));
        }
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $authUser = $session->read('Auth.User');
        
        if (!$authUser || !$authUser['es_administrador']) {
            $this->Flash->error(__('You do not have permission to perform this action'));
            return $this->redirect('/users');
        }

        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            if (!empty($data['password'])) {
                $hasher = new DefaultPasswordHasher();
                $data['password'] = $hasher->hash($data['password']);
            } else {
                unset($data['password']);
            }
            
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $authUser = $session->read('Auth.User');
        
        if (!$authUser || !$authUser['es_administrador']) {
            $this->Flash->error(__('You do not have permission to perform this action'));
            return $this->redirect('/users');
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
