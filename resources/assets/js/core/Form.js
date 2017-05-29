import Errors from './Errors';
import { http } from '../plugins/http/index'

class Form {
    constructor(data) {
        this.originalData = data
        this.resets = false

        for (let field in data) {
            this[field] = data[field]
        }

        this.errors = new Errors()
    }

    data() {
        let data = {}

        for (let property in this.originalData) {
            data[property] = this[property]
        }

        return data
    }

    reset(field) {
        if (this[field]) {
            this[field] = null

            return
        }
        
        for (let field in this.originalData) {
            if (field != 'resets') {
                this[field] = null
            }
        }

        this.errors.clear()
    }

    post(url) {
        return this.submit('post', url)
    }

    put(url) {
        return this.submit('put', url)
    }

    patch(url) {
        return this.submit('patch', url)
    }

    delete(url) {
        return this.submit('delete', url)
    }

    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            http[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data)

                    resolve(response.data)
                })
                .catch(error => {
                    this.onFail(error.response.data)

                    reject(error.response.data)
                });
        });
    }

    onSuccess(data){
        if (this.resets) this.reset()
    }

    onFail(errors) {
        this.errors.record(errors)
    }
}

export default Form