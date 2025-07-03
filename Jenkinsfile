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
        echo '📦 Copy .env file'
        sh 'cp .env.example .env'
        sh 'php artisan key:generate'
        
        echo '📁 Ensure SQLite database file exists'
        sh 'mkdir -p database && touch database/database.sqlite'
        
        echo '🧹 Clear caches'
        sh 'php artisan config:clear'
        sh 'php artisan view:clear'
        sh 'php artisan cache:clear'
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
