# ITEC 305 Final Project
“Trivia Quizzes”
Hosted at: http://23.236.194.106/
Fall 2020
NYIT

Anthony Noetzel, ID #1250720
Logan Pascucci, ID #1254407
Josh Smith, ID # 1272619


Individual Perspectives

Anthony:
When this project was first assigned, I joined Logan and Josh to form a team of three. We created a discord server right away. This allowed for a very easy way for us to all communicate with each other. Given the requirements for the project, we figured that the best thing to do first was to decide on our quiz topics and create our questions. We used google sheets to hold all of them and then exported the sheet into MySQL Workbench.
Josh suggested that the best way for writing the code would be to use PhpStorm and GitHub. That way we would each be able to always update the code to it’s latest version. When writing the code, we decided to focus on the functionality of each php page and to not worry about css until after everything was functioning properly. Writing the code for each page went along pretty quickly. While doing so, we also went back to revising things plenty of times.
When we were going through the css, we were thinking of all different things that we could do and different ways to style our pages. We went through a multitude of different fonts and colors before finally deciding on our best combination. As we were going along this led to new ideas of how to add css to other portions of our code. In order to do this, we made some slight modifications like making some portions being wrapped up in divs. By using divs with specific IDs it was easier to apply css to specific portions without affecting what else was on the page.

Logan:
    At the beginning of the project, Josh reached out to me to form a group and right after we talked to round out the group, I reached out to Anthony to be our 3rd member. I knew both Josh and Anthony from prior classes I have taken and because of this I felt confident that this project would turn out great because not only do we synergise well, but both Josh and Anthony are very dedicated to creating quality work. After forming our group we created a discord server and google drive folder in order to efficiently share our work and to have our work accessible by anyone in our group easily. 
In our first meeting after our group formed, Josh introduced us to Github and how we could link it to phpstorm in order to be able to constantly update our code to the latest version which was extremely useful. I helped out with the initial formatting of all of the files to get a base to start off of and from there the project took off. We were able to get a substantial portion of the code done right off the bat thanks to Josh’s knowledge of databases. One of my favorite parts of this project was when we sat down to determine what we wanted to make the quizzes based on and at the end of that session we stuck with the State Capitals and Movie quizzes. Anthony and I worked on the css portion of the code which was another fun session to work on. We honestly sat there for about an hour looking at all of the funny and unique fonts along with different colors/alignments for the text  would make the finished product look fun and interactive.
    In the end, this project was fun to work on. I feel like from this experience I was able to take away some new knowledge on how to use Github and how to overall use php with databases from my colleagues.
    
Josh:
Knowing this project would be much easier with help, I first contacted Logan because I had worked with him in other classes previously and knew that he can be a valuable asset to any team.  He contacted Anthony, who he knew from other classes, and our team was formed.  We started immediately by creating our own Discord server and a shared google drive folder, where we began by creating the quizzes in a spreadsheet.  The next time we met, I convinced the team that using PhpStorm and Github would help our workflow.  After we were all set up, the code started to come along fast.  We decided to focus on functionality first, leaving styling and CSS for last.  Having a virtual private server that I was no longer using, I offered it as an easy way to host and present our project.  I set up the account that would be used to access the database, and, after creating the .sql files in MySQL Workbench via imported .csv files, I was then able to import the .sql files into phpMyAdmin on the server.  This database uses MariaDB, but the MySQL driver worked just fine for the PDO statement.  From there, we just took it step-by-step to get everything functioning.  There was probably at least 3 times as much code written as what is in the final project, which indicates that this project has been optimized to the greatest extent that our skills and knowledge can achieve. Surely there is room for improvement, but what we have right now is fairly robust.
My favorite part of this project was when I added another PHP file called question.php which defines a custom Question class. This class has member variables for each attribute in the trivia tables.  We used this to store the information returned from the query into Question objects, and then those Questions go into an array that is passed to the results.php page.  This way, the database is only queried once per quiz attempt.




Project Timeline
11/21:
Started Google Drive Folder.
Made Google Sheets for Quizzes, began work on quizzes
Started a Discord server

12/2:
Met to discuss project, continue work on quizzes
Decided to use PHPStorm for the project, set up Github, discussed database options (.sql file or server?)

12/3:
Got quiz.php querying from remote server

12/9:
Met again to finish up tables.  Got both tables created on a remote server.
Discussed layout for quiz.php.
Started working with PDOStatement object; getting attributes, shuffling answers.
Displaying questions and answers.
Started working on results.php.
Added sql files to Git (just in case).

12/12:
Randomized and limited results from DB using SQL query.  Debated whether to do this using PHP, but decided this would be simpler.
Added links on index.php for each quiz.  Struggled with getting this to post with buttons.
Using $_GET to determine which quiz to display.
Fixed form on quiz.php, added submit button.
Added link from results to index.php.
Final Project will be accessible on http://23.236.194.106/

12/15:
Got IDs and answers to $_POST to results.php.
Checking each answer against the correct_answer in the database.
Incrementing correctAnswerTracker if correct, displaying correct answer if incorrect.

12/16:
Refactor: Made a Question object (in new file question.php) that stores the information for each table row.  We can then save these objects to an array and pass it in the $_SESSION to results.php, eliminating the need to query the database to check user answers.
Got css finished in quiz.css.
Added button images.
Formatted Submit button.
Added a favicon.
Added some more CSS formatting.
Removed unnecessary <br> tags.

