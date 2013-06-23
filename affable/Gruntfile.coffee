
module.exports = (grunt) ->

  grunt.initConfig
    pkg: grunt.file.readJSON 'package.json'
    less:
      compile:
        files:
          'css/all.css': 'css/style.less'
    coffee:
      compile:
        files:
          'js/affable.js': ['js/*.coffee']
    concat:
      options:
        separator: ';'
      all:
        src: ['../library/js/scripts.js', 'js/affable.js']
        dest: 'js/all.js'
    watch:
      less:
        files: ['css/*.less']
        tasks: ['less']
      coffee:
        files: ['js/*.coffee']
        tasks: ['coffee', 'concat']

  grunt.loadNpmTasks 'grunt-contrib-less'
  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.loadNpmTasks 'grunt-contrib-coffee'

  grunt.registerTask 'default', ['less', 'coffee', 'concat']
  grunt.registerTask 'dev', ['default', 'watch']

