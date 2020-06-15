export default class Gate{
	constructor(user){
		this.user = user;
	}

	isAdmin(){
		return this.user.type === 1;
	}
	isSubAdmin(){
		return this.user.type === 2;
	}
	isEditor(){
		return this.user.type === 3;
	}

	isAdminOrSubAdmin(){
		if((this.user.type === 1) || (this.user.type === 2)){
			return true;
		}
	}
}