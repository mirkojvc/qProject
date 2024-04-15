# Setup process

-   Added a new configuration to my installed Homestead vagrant machine.

-   Cloned the repo from laravel for fresh install

-   Deleted the old Homestead because I didn’t use it in a while and it didn’t work with the new laravel

-   Setup everything

-   Changed caching and session to be stored in redis and installed redis

-   Updated the permissions and ownership on storage and bootstrap/cache

-   Installed bladewind to make it pretty

## Potential improvements

- Better exception handeling with custom exceptions and better messaging
- Storage abstraction with a storage service, so we can change Cookie to session if needed or whatever
- Dynamic tables show partial models not whole
- Forms component that unifies  forms
- Unit tests for services and controllers
- CI on github actions that starts tests and a static analisys 
