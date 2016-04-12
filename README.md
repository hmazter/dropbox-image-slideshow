# Dropbox Image Slideshow

Web application to show images from a Dropbox folder as a slideshow

## Installation
### Clone repo
```
git clone https://github.com/hmazter/dropbox-image-slideshow.git
```

### Set up Dropbox app
* Get access token by creating a app here: https://www.dropbox.com/developers/apps
* Give it a name
* Select "Permission type: App folder"

### Set ENV
Copy `.env.example` to `.env` And add your access token to the `.env` file

### Add files to Dropbox folder
Dropbox will have created a folder for you at `/Apps/[The name of the app]`.
Add your images to that folder

### Set upp webserver
Point a web server (nginx, apache or similar) to the `/public` folder of the repo

### Done
Visit the page and see your images slide before you