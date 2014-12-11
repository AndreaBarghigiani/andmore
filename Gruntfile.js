module.exports = function(grunt){

    //Configuro Grunt
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                separator: "\n", //add a new line after each file
                banner: "(function($){", //added before everything
                footer: "})(jQuery);" //added after everything
            },
            dist: {
                // the files to concatenate
                src: [
                    'materialize/js/jquery.easing.1.3.js',
                    'materialize/js/velocity.min.js',
                    'materialize/js/hammer.min.js',
                    'materialize/js/leanModal.js',
                    'materialize/js/materialbox.js',
                    'materialize/js/parallax.js',
                    'materialize/js/tabs.js',
                    'materialize/js/tooltip.js',
                    'materialize/js/waves.js',
                    'materialize/js/toasts.js',
                    'materialize/js/sideNav.js',
                    'materialize/js/scrollspy.js',
                    'materialize/js/forms.js',
                    'materialize/js/jquery.hammer.js',
                    'materialize/js/date_picker/picker.js',
                    'materialize/js/date_picker/picker.date.js',
                    'materialize/js/collapsible.js',
                    'materialize/js/dropdown.js'
                ],
                // the location of the resulting JS file
                dest: 'js/<%= pkg.name %>.js'
            }
        },
        sass: {
            dist: {
                files: {
                    'css/materialize.css' : 'materialize/sass/materialize.scss'
                }
            }
        },
        watch: {
            css: {
                files: '**/*scss',
                tasks: ['sass']
            },
            scripts: {
                files: ['materialize/*.js'],
                tasks: ['concat'],
                options: {
                    interrupt: true
                }
            }
        }
    });

    //Creo i Task da Eseguire
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default',['watch']);
}
