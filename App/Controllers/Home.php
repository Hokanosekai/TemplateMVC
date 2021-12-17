<?php

class Home
{

    function index($params) {
        $view = new View('home');

        $view->render([
            'params' => $params
        ]);
    }

    /**
     * @param $params
     */
    public function error($params) {
        $view = new View('error');
        $view->render();
    }

    function login($params) {

        $view = new View('login');

        $modelUser = new UserModel();
        $errors = [];

        if (!empty($_POST)) {

            if (
                !empty($_POST['mail']) &&
                !empty($_POST['password'])
            ) {

                $mail = htmlspecialchars(trim($_POST['mail']));
                $password = htmlspecialchars(trim($_POST['password']));

                if (preg_match('/(.)+@.+\.com/',$mail)) {

                    if ($modelUser->exists($mail)) {

                        $user = $modelUser->find($mail);

                        if (password_verify($password, $user->getPassword())) {

                            unset($_SESSION['mail']);

                            $_SESSION['user'] = [
                                "nom" => $user->getNom(),
                                "prenom" => $user->getPrenom(),
                                "mail" => $user->getMail(),
                                "type" => $user->getType(),
                                "id" => $user->getId(),
                            ];

                            $view->redirect('home');

                        } else {
                            $errors['password'] = "Mot de passe incorrect";
                        }

                    } else {
                        $errors['user'] = "E-mail invalide";
                    }

                } else {
                    $errors['mail'] = "Merci de renseigner un mail valide";
                }

            } else {
                $errors['empty'] = "Merci de compléter tous les champs";
            }
        }


        $view->render([
            'errors' => $errors
        ]);
    }
}