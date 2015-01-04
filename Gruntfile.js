module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                sourceMap: false,
                outputStyle: 'compressed',
                imagePath: 'assets',
            },
            dist: {
                files: {
                    'css/app.css': 'scss/app.scss'
                }
            }
        },
        autoprefixer: {
            options: {
            
            },
            no_dest: {
                src: 'css/app.css'
            },
        },
        concat: {
            options: {
              separator: ';',
              stripBanners: true,
            },
            dist: {
              src: ['js/vendor/jquery.js', 'js/vendor/skrollr.js', 'js/vendor/tappy.js', 'js/pages/home.js', 'js/pages/projects.js', 'js/app.js'],
              dest: 'js/production.js',
            },
        },
        watch: {
            grunt: {
                files: ['Gruntfile.js']
            },
            css: {
                files: 'scss/**/*.scss',
                tasks: ['sass'],
                options: {
                  livereload: false,
                },
            },
            scripts: {
                files: ['js/vendor/jquery.js', 'js/app.js'],
                tasks: ['concat'],
                options: {
                  spawn: true,
                },
            }
        }
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('build', ['sass', 'autoprefixer', 'concat']);
    grunt.registerTask('default', ['build', 'watch']);

};