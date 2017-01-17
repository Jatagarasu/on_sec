onSec
====

How to set up project for developmet with XAMPP:
-------------
1. In your terminal / cmd / git bash, change into the **XAMP/htdocs/** directory

  * On mac: `cd /Applications/XAMPP/htdocs`
  * On Windows: `TODO `
  * On Linux: `TODO`

2. In your terminal / cmd / git bash:

  * *If you have SSH key set up (RECOMMENDED, [click here for a how-to](https://help.github.com/articles/generating-an-ssh-key/)):*

    `git clone git@github.com:David3141/on_sec.git`

  * *Or if you don't have SSH key set up:*

    `git clone https://github.com/David3141/on_sec.git`

*You now have cloned your project into the XAMPP/htdocs folder and can start developing*

General work flow
-----------------
1. If not already: change into development branch:

  `git checkout development`

2. Before developing a new feature, synchronize with repository:

  `git pull`
  
3. Create new feature branch to work in:

  `git checkout -b NAME-OF-FEATURE-BRANCH`

4. Make changes, then add them to your next commit:

  `git add changed_file_1 changed_file_2 ...` or `git add -p` for interactive adding or `git add -A` to add everything *(use with caution)*

5. After having added changed/new files, commit your changes with a message:

  `git commit -m "YOUR MESSAGE, e.g. Add README.md file"`

6. Repeat steps 3. and 4. until your feature is complete. Remember: **COMMIT EARLY, COMMIT OFTEN, several small commits > one big commit!**

7. When your feature is complete:

  `git checkout development`

  `git pull` to synchronize before merging

  `git merge NAME-OF-FEATURE-BRANCH`

  `git push origin development`
