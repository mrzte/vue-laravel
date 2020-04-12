export default class Gate{
    constructor(user){
        this.user = user;
    }

    admin(){
        return this.user.level === 'Admin';
    }

    verifikator(){
        return this.user.level === 'Verifikator';
    }

    user(){
        return this.user.level === 'User';
    }
}