//  NOTE: NOT WORKING YET - STILL BEING SETUP!
// ******************** DONT USE YET ****************************

// For setup see:
// https://css-tricks.com/autoprefixer/
//
// TL;DR, run:
// npm install
// 
// sudo npm install -g grunt-cli  --save-dev
// sudo npm install -g autoprefixer  --save-dev
// sudo npm install -g grunt-autoprefixer  --save-dev
// sudo npm install -g grunt-contrib-watch  --save-dev
// npm install

module.exports = function (grunt) {
    grunt.initConfig({
        autoprefixer: {
            dist: {
                files: {
                    'stylesheets/style.css': 'styles.css'
                }
            }
        },
        watch: {
            styles: {
                files: ['style.css'],
                tasks: ['autoprefixer']
            }
        }
    });
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-watch');
};


// Run with:
// grunt watch
