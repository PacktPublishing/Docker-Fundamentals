# My first Dockerfile

FROM ubuntu:trusty

# Adding labels to the image
LABEL name=myfirstimage version=v1.0
LABEL maintainer "schogini"

# Adding env variable with default value
ENV tempenv=ABC

# Adding ARG variable with default value
ARG myargument=default_value


RUN echo Current Argument value = $myargument \
 - Current Environment value = $tempenv

#RUN apt-get update && apt-get install -y wget

# Creating a folder
RUN mkdir /myvolume

# Copying files and folders
COPY file* /myvolume/
ADD folder1 /myvolume/folder1

# Adding an image from a url
#ADD https://www.docker.com/sites/default/files/whale_0.png /myvolume/

# Default command
CMD ["ls -l"]

# Adding ENTRYPOINT
ENTRYPOINT ["sh", "-c"]

