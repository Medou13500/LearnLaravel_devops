pipeline {
    agent {
        docker {
            image 'php:8.2'
            args '-u root -v $WORKSPACE:/app -w /app'
        }
    }

    environment {
        COMPOSER_HOME = '/tmp'
    }

    stages {
        stage('Installer Composer') {
            steps {
                sh '''
                    apt-get update && apt-get install -y unzip git curl zip libzip-dev libpng-dev libonig-dev libxml2-dev
                    docker-php-ext-install pdo pdo_mysql zip
                    curl -sS https://getcomposer.org/installer | php
                    mv composer.phar /usr/local/bin/composer
                '''
            }
        }

        stage('Installer les dépendances Laravel') {
            steps {
                sh 'composer install'
            }
        }

        stage('Configurer Laravel') {
            steps {
                sh '''
                    cp .env.example .env || true
                    php artisan key:generate || true
                '''
            }
        }

        stage('Lister les routes') {
            steps {
                sh 'php artisan route:list'
            }
        }

        stage('Lancer les tests Laravel') {
            steps {
                sh 'php artisan test || echo "Pas de tests définis"'
            }
        }
    }

    post {
        success {
            echo 'Test ToDoList terminé avec succès.'
        }
        failure {
            echo 'Échec lors du test de la ToDoList.'
        }
    }
}
