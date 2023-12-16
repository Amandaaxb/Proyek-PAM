package com.kel11pam.kantinitdel.model

class ResponUser {
    var success = 0
    lateinit var message:String
    lateinit var nama_lengkap: String
    lateinit var nomor_hp: String
    lateinit var email: String
    var User = User()
    var barang:ArrayList<Barang> = ArrayList()
    var pulsa:ArrayList<Pulsa> = ArrayList()
}