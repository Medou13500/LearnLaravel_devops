pipeline {
    agent any

    stages {
        stage('Test Laravel avec Docker') {
            steps {
                sh '''
                    docker run --rm \
                        -v ${WORKSPACE}:/app \
                        -w /app \
                        php:8.2 bash -c "
                            apt-get update &&
                            apt-get install -y unzip git curl zip libzip-dev libpng-dev libonig-dev libxml2-dev &&
                            docker-php-ext-install pdo pdo_mysql zip &&
                            curl -sS https://getcomposer.org/installer | php &&
                            mv composer.phar /usr/local/bin/composer &&
                            ls -la && pwd &&
                            composer install &&
                            cp .env.example .env || true &&
                            php artisan key:generate &&
                            php artisan migrate:fresh --seed || true &&
                            php artisan test
                        "
                '''
            }
        }
    }

    post {
        success {
            echo ' Pipeline exécutée avec succès dans un conteneur Docker Laravel.'
        }
        failure {
            echo 'Erreur pendant l’exécution du pipeline Docker Laravel.'
        }
    }
}
