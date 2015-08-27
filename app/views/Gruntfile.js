module.exports = function(grunt){
    grunt.initConfig({
        app: grunt.file.readJSON('app.json'),
      pkg: grunt.file.readJSON('package.json'),
      watch:{
          sass:{
            files: ['templates/Private/sass/*.scss'],
            tasks: ['sass','concat','cssmin'],
          },
          scirpts:{
            files: ['templates/Private/js/*.js'],
            tasks: ['uglify'],
          }
        },
      sass:{
        dist:{
          files:{
            'templates/Private/css/style.css' : 'templates/Private/sass/style.scss'
          }
        }
      },
      concat:{
        options:{
          seperator: ";",
          stripBanners: true,
          banner:'/*! <%= pkg.name %> -v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */',
        },
        js:{
          src: ['<%= app.assets.js %>'],
          dest: 'templates/Private/js/temp.js',
        },
        css:{
          src: ['<%= app.assets.css %>'],
         dest: 'templates/Private/css/temp.css',
       }
      },
      uglify:{
        options:{
          manage: false,
        },
        my_target:{
            files:{
              'templates/Public/js/main.min.js':['templates/Private/js/temp.js']
         }
        }
      },
      cssmin: {
         my_target:{
            files:{
              'templates/Public/css/style.min.css':['templates/Private/css/temp.css']
              }
            }
        }
      });
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default',["watch"]);
};