# Security

Because Agrabah Loans stores personal financial information it's important to know how Agrabah Loans is secured, and how it's not.

## Database

The database is not encrypted, and data in the tables of the database is readable for humans.
Make sure that you use a strong password to authenticate to the database and create a dedicated user for the Agrabah Loans database.
Whenever possible, use the disk encryption feature of your operating system to encrypt the disk on which the database is stored.

When you connect your Agrabah Loans instance to the internet, make sure that the database can't be connected to from the web,
but only from localhost. Preferrably, the database host can only be reached from the Agrabah Loans host.

ID's used for objects in Agrabah Loans are incremental numbers.
Logged in users may infer the existence of objects owned by other users by changing the ID in the address bar and observing 404's.
This is not possible for guests.

## Personal information

When logged out, Agrabah Loans will not leak personal information.
There is no identifying information in the pages that are available to guest users.
The reset password option will not confirm if accounts exist.

## Storage

Agrabah Loans stores all uploaded attachments unencrypted in the `/storage/upload` directory. Users who have permissions to the file system will be able to get uploaded attachments for all users.

## Encryption

No encryption of data-at-rest is used. Use your operating system's disk encryption features for further protection of data-at-rest. For data-in-transit, see TLS below.

A public/private keypair is generated to be used for the signing of API keys (Personal Access Tokens and OAuth Clients). This keypair is stored under `/storage` and has no further protection.

## Debug

When you set the `APP_DEBUG` environment variable to `true`, Agrabah Loans will leak an amazing amount of private data when it encounters a bug. This includes secrets and passwords.

Bugs may also appear (and thus leak sensitive information) on pages not protected by a user login. An example would be the password reset page: misconfigured email settings may expose sensitive information when Agrabah Loans reports the issue through an error page.

## Logging

By default Agrabah Loans outputs its logs to `stdout` and to a file in `/storage/logs`. That means that users who have permission to read these files or permission to the Docker engine can trace the log files and extract personal information from them. You can set the `APP_LOG_LEVEL` to `error` to prevent the logging of most information or to `emergency` to prevent the logging of any information. When using Docker, keep in mind that Apache2 will keep logging each http request.

Even logging just error information may leak data.

## Security bugs and issues

!!! danger
If you find a security issue or problem with Agrabah Loans, please refer to the [Security Policy](https://github.com).

## Other stuff

If you have more questions regarding the security of Agrabah Loans, or how to secure your Agrabah Loan installation, please [contact me directly](mailto:test@email.com) or open 
[a ticket on GitHub](https://github.com).

