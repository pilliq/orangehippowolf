Phillip Quiza, Josh Beninson, Joseph Calvano

The new version of this project is located at the server URL:
http://cs336-52.rutgers.edu/public

If you would like to see the code, you can also view the project on github: 
https://github.com/pilliq/orangehippowolf
All commits after 32b2a260d0 (commit message: "The big one") are changes after
the due date of the project. It might be easier to view the diffs of the code
on github. 

Things that are changed in this version of the project:
    - Added ability for instructor to create a course offering

    - Added ability for instructor to add a rank algorithm for course offering

    - Added ability for instructor to specify multiple prereqs for course 
      offering

    - Added ability for instructor to see the courses he/she created

    - Added ability for student to specify multiple majors when signing up for
      an account

    - Every page now has pretty "success" and "error" messages to show the 
      status of each action done by the user

    - Added a registration table and the ability to load new registration files
      via SQL commands

    - All requests are now ranked by the course offering's rank algorithm when 
      created via the site

    - Requests are denied automatically if student has not taken prereq, or if 
      prereq was failed and not retaken

    - Added ability to view all the requests an instructor receives by course 
      (this took a long time)

    - Added ability to grant permission if previously denied, and to deny 
      permission if previously granted

    - Added ability to email requesters by course section and by status groups 
      All, Denied, Pending, Granted, Inactive, and Expired (login as a 
      professor user: lrooney, password: password, then navigate to "/requests"
      and you'll see what we mean)

    - Added ability to view all send messages

Caveats:
    - Routing is still a bit messed up for the homepage for instructor
	- once you login as instructor, add "/requests" to the URL to get to 
	  the instructor's homepage
	- routing to homepage for the student is fine
    - No ability to expire special permission
    - Triggering of database to deny permission when student fails a course on 
      registration update

Other things:
    We would like encourage you to see the homepage for the professor (remember
    to add "/requests"). We're pretty proud of it and it took us the most time.
    Add a few courses, create a few student accounts, and create a few requests
    to see how the requests view for the professor works. The view shows a lot 
    of the features mentioned above.

    We automated a bunch of things like deploying the code, and fake data 
    insertion. The scripts were written with a mix of bash, PHP, and Python. 
    These scripts can be viewed in the automation/ folder in the project root 
    (autmation/insert automation/deploy automation/dit/accounts.py 
    automation/dit/data.php). The fake data we used can be view in 
    automation/dit/*.dat.

Conclusion:
    We all learned a ton doing this project. A few of the things we learned 
    were version control, how to setup a git server, deploying and 
    administering a web application on Linux, vim, Model View Controller (MVC) 
    architectures, HTML/CSS/JS, and the Laravel PHP framework. Although we were
    a day late, we think the time we spent building it and the knowledge we 
    gained was well worth it. We hope you enjoy reading our code :)
