pipeline {
    agent any

    stages {
        stage('Test Laravel avec Docker') {
            steps {
                sh '''
                    docker run --rm -v "$PWD":/app -w /app php:8.2 bash -c "
                        apt-get update && apt-get install -y unzip git curl zip libzip-dev libpng-dev libonig-dev libxml2-dev &&
                        docker-php-ext-install pdo pdo_mysql zip &&
                        curl -sS https://getcomposer.org/installer | php &&
                        mv composer.phar /usr/local/bin/composer &&
                        composer install &&
                        cp .env.example .env || true &&
                        php artisan key:generate || true &&
                        php artisan route:list &&
                        php artisan test
                    "
                '''
            }
        }
    }

    post {
        success {
            echo 'Pipeline exécuté avec succès dans Docker.'
        }
        failure {
            echo 'Erreur durant l\'exécution dans Docker.'
        }
    }
}


