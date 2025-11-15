import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final TextEditingController nippController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();

  bool isLoading = false;
  bool showPassword = false;

  Future<void> loginProcess() async {
    setState(() => isLoading = true);

    final url = Uri.parse("https://your-api-domain.com/api/login");

    final response = await http.post(
      url,
      headers: {"Content-Type": "application/json"},
      body: jsonEncode({
        "nipp": nippController.text.trim(),
        "password": passwordController.text.trim(),
        "device_name": "Flutter Mobile Device"
      }),
    );

    setState(() => isLoading = false);

    if (response.statusCode == 200) {
      final data = jsonDecode(response.body);

      final token = data["token"];
      final role = data["user"]["role"];
      final first = data["is_first_login"];

      if (first == true) {
        Navigator.pushReplacementNamed(context, "/change-password");
        return;
      }

      if (role == "Pengawas") {
        Navigator.pushReplacementNamed(context, "/dashboard-pengawas");
      } else if (role == "Mekanik") {
        Navigator.pushReplacementNamed(context, "/dashboard-mekanik");
      }
    } else if (response.statusCode == 401) {
      _showError("NIPP atau Password salah.");
    } else if (response.statusCode == 422) {
      _showError("Data yang diberikan tidak valid.");
    } else {
      _showError("Terjadi kesalahan pada server.");
    }
  }

  void _showError(String message) {
    showDialog(
      context: context,
      builder: (_) => AlertDialog(
        title: const Text("GAGAL"),
        content: Text(message),
        actions: [
          TextButton(
            onPressed: () => Navigator.pop(context),
            child: const Text("OK"),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: SafeArea(
        child: SingleChildScrollView(
          padding: const EdgeInsets.symmetric(horizontal: 28, vertical: 10),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              const SizedBox(height: 35),

              // LOGO KAI (gelap-besar, sesuai figma)
              Image.asset(
                "assets/images/logo warna.png",
                width: 160,
              ),

              const SizedBox(height: 60),

              // FIELD NIPP
              Align(
                alignment: Alignment.centerLeft,
                child: Text(
                  "NIPP",
                  style: TextStyle(
                    fontSize: 14,
                    fontWeight: FontWeight.w500,
                    color: Colors.grey[700],
                  ),
                ),
              ),
              const SizedBox(height: 6),
              _roundedInput(
                controller: nippController,
                hint: "Masukkan NIPP",
                keyboard: TextInputType.number,
              ),

              const SizedBox(height: 20),

              // FIELD PASSWORD
              Align(
                alignment: Alignment.centerLeft,
                child: Text(
                  "Kata Sandi",
                  style: TextStyle(
                    fontSize: 14,
                    fontWeight: FontWeight.w500,
                    color: Colors.grey[700],
                  ),
                ),
              ),
              const SizedBox(height: 6),
              _roundedInput(
                controller: passwordController,
                hint: "Masukkan Kata Sandi",
                obscure: !showPassword,
                suffixIcon: IconButton(
                  icon: Icon(
                    showPassword ? Icons.visibility_off : Icons.visibility,
                    color: Colors.grey,
                  ),
                  onPressed: () {
                    setState(() => showPassword = !showPassword);
                  },
                ),
              ),

              const SizedBox(height: 40),

              // BUTTON MASUK
              SizedBox(
                width: double.infinity,
                height: 56,
                child: ElevatedButton(
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color(0xFF1F2B7B),
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(40),
                    ),
                  ),
                  onPressed: isLoading ? null : loginProcess,
                  child: isLoading
                      ? const CircularProgressIndicator(color: Colors.white)
                      : const Text(
                          "MASUK",
                          style: TextStyle(
                            fontSize: 18,
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                ),
              ),

              const SizedBox(height: 40),
            ],
          ),
        ),
      ),
    );
  }

  Widget _roundedInput({
    required TextEditingController controller,
    required String hint,
    bool obscure = false,
    TextInputType keyboard = TextInputType.text,
    Widget? suffixIcon,
  }) {
    return Container(
      height: 52,
      decoration: BoxDecoration(
        color: const Color(0xFFF4F4F4),
        borderRadius: BorderRadius.circular(40),
      ),
      padding: const EdgeInsets.symmetric(horizontal: 18),
      child: Center(
        child: TextField(
          controller: controller,
          obscureText: obscure,
          keyboardType: keyboard,
          decoration: InputDecoration(
            border: InputBorder.none,
            hintText: hint,
            suffixIcon: suffixIcon,
          ),
        ),
      ),
    );
  }
}
