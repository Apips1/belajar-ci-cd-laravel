pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
            }
        }
        stage('Prepare Environment') {
            steps {
                sh '''
                    cp .env.example .env || true
                    php artisan key:generate
                '''
            }
        }
        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }
        stage('Build App') {
            steps {
                echo 'Building Laravel App...'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying Laravel App...'
            }
        }
    }
}
