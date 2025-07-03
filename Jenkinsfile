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
                sh '''
                    cp .env.example .env
                    php artisan key:generate
                    php artisan config:clear
                    php artisan view:clear
                    php artisan cache:clear
                    php artisan config:cache
                '''
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    def result = sh(script: 'php artisan test', returnStatus: true)
                    if (result != 0) {
                        echo '❌ Test Gagal - Akan tampilkan log Laravel'
                        sh 'cat storage/logs/laravel.log || echo "Log tidak ditemukan."'
                        error("Test gagal!")
                    } else {
                        echo '✅ Semua test berhasil!'
                    }
                }
            }
        }
    }
}
