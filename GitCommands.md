### Git commands

View the status of your staging area
```bash
$ git status
```
Add one file to staging area
```bash
$ git add myfile.py
```
Add multiple files to staging area
```bash
$ git add .
```
Commit all staged files
```bash
$ git commit
```
Commit all modified unstaged files
```bash
$ git commit -a
```
View all remote branches
```bash
$ git branch -r
```
Get all remote branches
```bash
$ git pull
```
Checkout an existing remote branch
```bash
$ git checkout githubBranch
```
Create a new local branch
```bash
$ git checkout -b myNewLocalbranch
```
Push a newly created local branch to remote
```bash
$ git push -u origin myNewLocalBranch
```
Push to remote when local branch and remote branch exist and have the same name
```bash
$ git push
```
Incorporate all changes that are in the remote tracking branch into your local branch
```bash
$ git pull
```
View history of all commits
```bash
$ git log
```
Reset your working directory to a pristine state (Note this will wipe out any changes you made)
```bash
$ git reset HEAD --hard
```