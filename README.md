# OWASP ASST WITH DOCKER
OWASP ASST (Automated Software Security Toolkit) version to run with Docker.

First of all, special thanks to @Tarık Seyceri for awesome job with the original project.

To read the original Readme File or check the original repository: [OWASP ASST](https://github.com/OWASP/ASST).

This version runs with Docker, next follow commands to start, configure, run the toolkit and see the report.

### Commands
------------

1. Start Container and install node dependencies:

```shell
docker-compose up -d
docker exec -it asst-app npm install --prefix ./ASST

```

2. Copy your project `/your-machine-path/my-app` to target directory scan `./src/projectToScan/my-app`


3. Run the toolkit:

```shell
docker exec -it asst-app node ./ASST/main.js my-app
```
**IMPORTANT:** `my-app` param needs to be the same directory name project to scan. A `example-app` already exists with a sample php file for example, you can remove it.

4. See the report and reference docs:
- Report: http://localhost:808
- Some Doc example link: http://localhost:8080/app/ASST/langs/php/docs/php_cross_site_request_forgery_prevention.pdf

### Some Notes and Improvement
------------------------------

- Point as a param the target directory app to scan, for example:

```shell

# Target Directory
/projectToScan/my-app
/projectToScan/my-another-app


# Commands
docker exec -it asst-app node ./ASST/main.js my-app
docker exec -it asst-app node ./ASST/main.js my-another-app

``` 

- Node dependencies must be installed, the `node_modules` dir was added to .gitignore file.


- Made some adjustments in file core/index.js to run on container:

```javascript
  if(traverse){
    arrayOfFiles = this.getAllFilesPaths(dirPath + "/" + file, arrayOfFiles, traverse, listOnlySpecificExtensions, extensions, ignoreFilesOrFolders);
  }
  else {
    arrayOfFiles.push(path.join(__dirname, dirPath, "/", file + "/").replace("\\"+config.THIS_PROJECT_FOLDER_NAME, "").replace("/"+config.THIS_PROJECT_FOLDER_NAME, ""));
  }
```

