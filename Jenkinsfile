


pipeline {
    agent any
        environment {
        SLACK_WEBHOOK = 'https://hooks.slack.com/services/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'
    }


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

        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }

        stage('Build App') {
            steps {
                echo '✅ Build successful!'
            }
        }

        stage('Deploy') {
            when {
                branch 'main'
            }
            steps {
                echo '🚀 Deploying to production server...'
                // contoh deploy (rsync/scp)
                // sh 'rsync -avz ./ user@yourserver:/var/www/html/'
            }
        }
    }
    
post {
    success {
        sh """
        curl -X POST -H 'Content-type: application/json' --data '{
            "channel": "#laravel",
            "username": "JenkinsBot",
            "text": "✅ Build SUCCESS: ${env.JOB_NAME} #${env.BUILD_NUMBER} on branch ${env.BRANCH_NAME}",
            "icon_emoji": ":rocket:"
        }' ${slackWebhook}
        """
    }
    failure {
        sh """
        curl -X POST -H 'Content-type: application/json' --data '{
            "channel": "#laravel",
            "username": "JenkinsBot",
            "text": "❌ Build FAILED: ${env.JOB_NAME} #${env.BUILD_NUMBER} on branch ${env.BRANCH_NAME}",
            "icon_emoji": ":x:"
        }' ${slackWebhook}
        """
    }
}
}
