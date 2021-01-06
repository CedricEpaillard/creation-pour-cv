const {
    GuildMember,
    GuildMemberRoleManager
} = require('discord.js')
const Commande = require('../commande')

module.exports = class eveil extends Commande {
    static match(message) {
        if (message.mentions.users.size ==! 1 ) {
            return false
        } 
            return message.content.startsWith('!eveil')
        
    }
    static action(message) {
        let member = message.mentions.members.first();
        //  console.log('test')
        let RangE = message.guild.roles.resolve('796319359801884683');
        let RangD = message.guild.roles.resolve('796319362059206697');
        let RangC = message.guild.roles.resolve('796342837440020550');
        let RangB = message.guild.roles.resolve('796342863892971530');
        let RangA = message.guild.roles.resolve('796342895790784512');
        let RangS = message.guild.roles.resolve('796342912409010226');
        let RangNation = message.guild.roles.resolve('796342912409010226');
        let RangMonarque = message.guild.roles.resolve('796342957199851570');
        const random = Math.random()
        if (random < 0.000001) {
            message.reply('Bienvenue à vous Monarque. Que ta volonté soit faite')
            member.roles.add(RangMonarque).catch(console.error)
        } else if (random < 0.000011) {
            message.reply('Sous tes pieds la terre tremble')
            member.roles.add(RangNation).catch(console.error)
        } else if (random < 0.010011) {
            message.reply('Tu deviens un des plus puissants de ce pays')
            member.roles.add(RangS).catch(console.error)
        } else if (random < 0.0510011) {
            message.reply('Peu de danger vous font peur à présent')
            member.roles.add(RangA).catch(console.error)
        } else if (random < 0.1210011) {
            message.reply('Vivre en tant que chasseur, voilà un très bon début')
            member.roles.add(RangB).catch(console.error)
        } else if (random < 0.2710011) {
            message.reply('Vous savez que vous allez devenir utile aux seins des chasseurs')
            member.roles.add(RangC).catch(console.error)
        } else if (random < 0.5710011) {
            message.reply('La chasse peut réellement devenir un hobby')
            member.roles.add(RangD).catch(console.error)
        } else {

            message.channel.send(member.displayName+' tu es devenu plus fort que tout humain normalement constitué et tu rejoins officiellement le Rang E')
            let role = message.guild.roles.resolve('796319362059206697');

            if (member.roles.cache.get(role.id)) {
                member.roles.remove(role)
            }
            member.roles.add(RangE).catch(console.error)


        }


    }




}