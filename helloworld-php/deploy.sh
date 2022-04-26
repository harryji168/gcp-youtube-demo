MY_INSTANCE_NAME='my-app-instance'
ZONE=us-central1-a

gcloud compute instances create $MY_INSTANCE_NAME \
    --image-family=ubuntu-1804-lts \
    --image-project=ubuntu-os-cloud \
    --machine-type=g1-small \
    --scopes userinfo-email,cloud-platform,sql-admin \
    --metadata-from-file startup-script=scripts/startup-script.sh \
    --zone $ZONE \
    --tags http-server