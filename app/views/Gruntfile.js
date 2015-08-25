module.exports = function(grunt){
    grunt.initConfig({

      pkg: grunt.file.readJSON('package.json'),
      watch:{
          sass:{
            files: ['templates/Private/sass/*.scss'],
            tasks: ['sass','cssmin'],
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
        dist:{
          src: ['Templates/Private/js/input2.js'],
          dest: 'Templates/Private/js/main.min.js',
        }
      },
      uglify:{
        options:{
          manage: false,
        },
        my_target:{
            files:{
              'templates/Public/js/main.min.js':['templates/Private/componentJs/*.js','templates/Private/js/*.js']
         }
        }
      },
      cssmin: {
        my_target:{
          //combine:{
            //files: {
              //'css/style.css':['css/style2.css', 'css/style3.css']
            //}
          //}

          files:[{
              expand: true,
              cwd: 'templates/Private/css/',
              src:['*.css', '!*.min.css'],
              dest:'Templates/Public/css/',
              ext:'.min.css'
            }]
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