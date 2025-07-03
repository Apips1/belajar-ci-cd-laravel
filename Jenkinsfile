pipeline {
    agent any

    stages {
        stage('Checkout Code') {
            steps {
                git url: 'git@github.com:Apips1/belajar-ci-cd-laravel.git', branch: 'main'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install'
            }
        }

        stage('Prepare Environment') {
            steps {
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
                sh 'php artisan config:cache'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }
        post {
    always {
        sh 'cat storage/logs/laravel.log || true'
    }
}

    }
}
