using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace FridgeFusionSeleniumTests
{
    [TestClass]
    class RegisterTests
    {
        private ChromeDriver chromeDriver;

        [TestInitialize]
        public void Initialize()
        {
            chromeDriver = new ChromeDriver();
            chromeDriver.Manage().Window.Maximize();
            chromeDriver.Navigate().GoToUrl("http://localhost:8881/register");
            Thread.Sleep(10000);
        }
        [TestCleanup]
        public void TearDown()
        {
            chromeDriver.Quit();
        }
        [TestMethod]
        public void Registuser()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("Aplle12");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma@alma.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma123");

            IWebElement passwordconfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordconfInput.SendKeys("Alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector(".btn-regist"));
            registerButton.Click();

            Assert.AreEqual("\"http://localhost:8881/", chromeDriver.Url);
        }
        [TestMethod]
        public void TestRegisterWithBadUsername ()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("App");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma@alma.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma123");

            IWebElement passwordconfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordconfInput.SendKeys("Alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector(".btn-regist"));
            registerButton.Click();

            Assert.AreEqual("\"http://localhost:8881/", chromeDriver.Url);
        }
        [TestMethod]
        public void TestRegisterWithBadEmail()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("Alma73");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma22.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma123");

            IWebElement passwordconfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordconfInput.SendKeys("Alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector(".btn-regist"));
            registerButton.Click();

            Assert.AreEqual("\"http://localhost:8881/", chromeDriver.Url);
        }
        [TestMethod]
        public void TestRegisterWithBadPassword()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("Alma73");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma22.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("alma123");

            IWebElement passwordconfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordconfInput.SendKeys("alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector(".btn-regist"));
            registerButton.Click();

            Assert.AreEqual("\"http://localhost:8881/", chromeDriver.Url);
        }
    }
}
