var QBconfig = {
    credentials: {
        appId: '86447',
        authKey: 'QvHmb3JYLNjq7Yq',
        authSecret: 'FeWgReOhXwymD2Q'
    },
    appConfig: {
        chatProtocol: {
            active: 2
        },
        streamManagement: {
            enable: true
        },
        debug: {
            mode: 1,
            file: null
        }
    }
};

var appConfig = {
    dilogsPerRequers: 15,
    messagesPerRequest: 50,
    usersPerRequest: 15,
    typingTimeout: 3 // 3 seconds
};

var CONSTANTS = {
    DIALOG_TYPES: {
        CHAT: 3,
        GROUPCHAT: 2,
        PUBLICCHAT: 1
    },
    ATTACHMENT: {
        TYPE: 'image',
        BODY: '[attachment]',
        MAXSIZE: 5 * 1000000, // set 5 megabytes,
        MAXSIZEMESSAGE: 'Image is too large. Max size is 2 mb.'
    },
    NOTIFICATION_TYPES: {
        NEW_DIALOG: '1',
        UPDATE_DIALOG: '2',
        LEAVE_DIALOG: '3'
    }
};
