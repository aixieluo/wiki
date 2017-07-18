import Errors from './Errors';
import {http} from '../plugins/http/index'

class Form {
    constructor(data) {
        this.originalData = data
        this.resets = false         //判断是否要重置所有数据
        this.disabled = false       //判断submit是否处于禁用状态
        this.uploadImages = []      //存储上传的图片地址

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

        if (this.uploadImages) data.uploadImages = this.uploadImages

        return data
    }

    reset(field) {
        if (this[field]) {
            this[field] = null

            return
        }

        for (let field in this.originalData) {
            if (field != 'resets' && field != 'disabled') {
                this[field] = null
            } else if (field == 'uploadImgs') {
                this[field] = []
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
        if (this.disabled) return
        this.disabled = true
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

    onSuccess(data) {
        if (this.resets) this.reset()
        this.disabled = false
    }

    onFail(errors) {
        this.errors.record(errors)
        this.disabled = false
    }
}

export default Form