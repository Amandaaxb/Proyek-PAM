package com.kel11pam.kantinitdel.fragment

import android.os.Bundle
import android.view.*
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import androidx.viewpager.widget.ViewPager
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.adapter.AdapterMenu
import com.kel11pam.kantinitdel.adapter.AdapterPulsa
import com.kel11pam.kantinitdel.adapter.AdapterSlider
import com.kel11pam.kantinitdel.app.ApiConfig
import com.kel11pam.kantinitdel.model.Barang
import com.kel11pam.kantinitdel.model.Pulsa
import com.kel11pam.kantinitdel.model.ResponUser
import kotlinx.android.synthetic.main.activity_login.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

/**
 * A simple [Fragment] subclass.
 */
class HomeFragment : Fragment() {

   private lateinit var vpSlider: ViewPager
   private lateinit var rvMenu: RecyclerView
   private lateinit var rvMenu1: RecyclerView

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view: View = inflater.inflate(R.layout.fragment_home, container, false)
        init(view)
        getPulsa()
        getBarang()


        return view
    }

    fun init(view: View){
        vpSlider = view.findViewById(R.id.vp_slider)
        rvMenu = view.findViewById(R.id.rv_menu)
        rvMenu1 = view.findViewById(R.id.rv_pulsa)
    }

    fun displayProduk(){
        var arrSlider = ArrayList<Int>()
        arrSlider.add(R.drawable.kantin1)
        arrSlider.add(R.drawable.kantin2)
        arrSlider.add(R.drawable.kantin3)

        val adapterSlider = AdapterSlider(arrSlider, activity)
        vpSlider.adapter = adapterSlider

        val layoutManager = LinearLayoutManager(activity)
        layoutManager.orientation = LinearLayoutManager.HORIZONTAL

        val layoutManager1 = LinearLayoutManager(activity)
        layoutManager1.orientation = LinearLayoutManager.HORIZONTAL

        rvMenu.adapter = AdapterMenu(requireActivity(), listBarang)
        rvMenu.layoutManager = layoutManager

        rvMenu1.adapter = AdapterPulsa(requireActivity(), listPulsa)
        rvMenu1.layoutManager = layoutManager1
    }

    private var listBarang:ArrayList<Barang> = ArrayList()
    private var listPulsa:ArrayList<Pulsa> = ArrayList()

    fun getBarang(){
        ApiConfig.instanceRetrofit.getKoperasi().enqueue(object : Callback<ResponUser> {
            override fun onResponse(call: Call<ResponUser>, response: Response<ResponUser>) {
                val res = response.body()!!
                if(res.success == 1){
                    listBarang = res.barang
                    displayProduk()
                }
            }

            override fun onFailure(call: Call<ResponUser>, t: Throwable) {

            }


        })
    }

    fun getPulsa() {
        ApiConfig.instanceRetrofit.getPulsa().enqueue(object : Callback<ResponUser> {
            override fun onResponse(call: Call<ResponUser>, response: Response<ResponUser>) {
                val res = response.body()!!
                if (res.success == 1) {
                    listPulsa = res.pulsa
                    displayProduk()
                }
            }

            override fun onFailure(call: Call<ResponUser>, t: Throwable) {

            }


        })
    }
}




