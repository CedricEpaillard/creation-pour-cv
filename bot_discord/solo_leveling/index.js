const Discord = require('discord.js')
const bot = new Discord.Client()
const eveil = require('./commande/eveil')

bot.on('ready', function () {
    
/*bot.user.setAvatar('./image_bot.jpg')
.then (() => console.log('Avatar opérationnel'))
.catch(console.error)*/

bot.on('guildMemberAdd', function (member) {
    member.createDM().then(function (channel) {
      return channel.send('Bienvenue '+ member.displayName+' sur  le serveur RP de solo leveling, tape !eveil dans le channel "eveil et rééveil" pour avoir ton rang ! ')
    }).catch(console.error)
    
})



bot.on('message', function (message) {
eveil.parse(message)
})


console.log('Ready')
})

bot.login('Nzk2MjkwNTQxMDcwNDUwNjg4.X_VxWw.JOjBBGQPQAtAepzHIqQJgB802Uo')