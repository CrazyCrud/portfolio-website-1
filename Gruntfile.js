module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                imagePath: 'assets',
                outputStyle: 'compressed',
            },
            dist: {
                files: {
                    'css/home.css': 'scss/home.scss',
                    'css/projects.css': 'scss/projects.scss'
                }
            }
        },
        autoprefixer: {
            options: {
            
            },
            no_dest: {
                src: 'css/home.css'
            },
        },
        concat: {
            options: {
              separator: ';',
              stripBanners: true,
            },
            home: {
              src: ['js/vendor/jquery.js', 'js/vendor/skrollr.js', 'js/vendor/tappy.js', 'js/app.js', 'js/sections/home.js'],
              dest: 'js/home.js',
            },
            project: {
                src: ['js/vendor/jquery.js', 'js/vendor/skrollr.js', 'js/vendor/tappy.js', 'js/vendor/animsition.js','js/app.js', 'js/sections/projects.js'],
                dest: 'js/project.js',
            }
        },
        criticalcss: {
            custom_options:{
                options: {
                    url: "http://localhost/portfolio-website-2/index.php",
                    width: 1200,
                    height: 900,
                    outputfile: "css/critical.css",
                    filename: "css/app.css",
                    buffer: 800*1024
                }
            }
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
                files: ['js/vendor/jquery.js', 'js/app.js', 'js/sections/home.js', 'js/sections/projects.js'],
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
    grunt.loadNpmTasks('grunt-criticalcss');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('build', ['sass', 'autoprefixer', 'concat', 'criticalcss']);
    grunt.registerTask('default', ['build', 'watch']);

};