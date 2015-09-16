module.exports = function (grunt) {

    //load tasks from devDependencies within bower.json
    require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

    //because you can't abstract too much
    var nickoConfig = {
        jsSite: 'app-site',
        jsdash: 'app-dash',
        jsLibraries: 'libs',
        production: 'staging'
    }
    grunt.initConfig({

        nicko: nickoConfig,

        clean: {
            // production: ['production/'] this either creates or deletes the directory
            production: {
                files: [{
                    dot: true,
                    src: ['<%=nicko.production %>/*']
                }]
            }
        },

        //
        //let's all join together
        //
        concat: {
            nicko: {
                src: [
                    '<%=nicko.jsCustom %>/app.js',
                    '<%=nicko.jsCustom %>/directives/responsive-trigger.js',
                    '<%=nicko.jsCustom %>/directives/backbutton.js'

                ],
                dest: '<%=nicko.production %>/<%=nicko.jsCustom %>/nicko.js'
            },
            thirds: {
                src: [],
                dest: '<%=nicko.production %>/<%=nicko.jsCustom %>/third-party.js'
            },
            angular: {
                src: [
                '<%=nicko.jsLibraries %>/angular/angular.min.js',
                '<%=nicko.jsLibraries %>/angular-animate/angular-animate.min.js',
                '<%=nicko.jsLibraries %>/angular-touch/angular-touch.min.js'
                ],
                dest: '<%=nicko.production %>/<%=nicko.jsCustom %>/all-angular.min.js'
            }
        },

        //
        // Copy files not handled in other tasks
        //
        copy: {
            production: {
                files: [{
                    expand: true,
                    dot: false,
                    dest: '<%=nicko.production %>',
                    src: [
                        '*.php',
                        // 'inc/*', //solved by tweaking functions.php
                        // 'languages/*', //solved by tweaking functions.php
                        'style.css',
                        // 'js/libraries/angular/angular.min.js',
                        'fonts/*',
                        'images/*.png',
                        'images/*.jpg',
                        'images/*.ico'
                    ]
                }]
            }
        },

        //
        //Minify the CSS
        //
        cssmin: {
            minify: {
                // expand: true,
                // src: ['*.css', '!*.min.css'],
                src: '<%=nicko.production %>/style.css',
                dest: '<%=nicko.production %>/style.css'
            }
        },

        //
        //Revision the files
        //
        filerev: {
            dist: {
                src: [
                '<%=nicko.production %>/<%=nicko.jsCustom %>/nicko.js',
                '<%=nicko.production %>/<%=nicko.jsCustom %>/third-party.js',
                '<%=nicko.production %>/<%=nicko.jsLibraries %>/all-angular.min.js'
                ]
            }
        }

    }); //end initConfig

    //
    //Register tasks here
    //
    grunt.registerTask('build', [
        'clean:production',
        'copy:production',
        'concat:nicko',
        'concat:third-party',
        'concat:angular',
        'cssmin',
        'filerev'
     ]);


}; //end grunt function